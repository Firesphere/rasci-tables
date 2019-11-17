<?php


namespace Firesphere\ISO27001Compliance\Models;

use Firesphere\ISO27001Compliance\Pages\AnnexPage;
use SilverStripe\Control\Controller;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\AnnexSet
 *
 * @property string $Title
 * @method AnnexPage Page()
 * @method DataList|AnnexChapter[] AnnexChapters()
 * @method ManyManyList|Team[] Teams()
 */
class AnnexSet extends DataObject
{
    /**
     * @var array|ArrayList
     */
    public static $teams = [];
    protected static $teamCount = false;
    private static $table_name = 'ISO27k1AnnexSet';

    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    private static $belongs_to = [
        'Page' => AnnexPage::class,
    ];

    private static $has_many = [
        'AnnexChapters' => AnnexChapter::class,
    ];

    private static $many_many = [
        'Teams' => Team::class,
    ];

    /**
     * @throws \SilverStripe\ORM\ValidationException
     */
    public function onAfterWrite()
    {
        if (!$this->AnnexChapters()->count()) {
            foreach (static::config()->get('annexes') as $annex) {
                AnnexChapter::create([
                    'Title'      => $annex['Title'],
                    'AnnexNo'    => $annex['Number'],
                    'AnnexSetID' => $this->ID,
                    'Reference'  => $annex['Reference'],
                ])->write();
            }

            // Default to adding all teams. It's easier to unlink later
            // Than to add later
            foreach (Team::get() as $team) {
                $this->Teams()->add($team);
            }
        }
        parent::onAfterWrite();
    }

    /**
     * @param null|Member $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return false;
    }

    public function getTeamCount($plus = 0)
    {
        $multiplier = 1;
        if (static::$teamCount === false) {
            if (Controller::curr()->compare) {
                $multiplier = 2;
            }
            static::$teamCount = $this->Teams()->count() * $multiplier;
        }

        return static::$teamCount + $plus;
    }

    public function getCachedTeams()
    {
        if (!static::$teams) {
            static::$teams = ArrayList::create($this->Teams()->toArray());
        }

        return static::$teams;
    }
}
