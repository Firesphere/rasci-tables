<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\AnnexPage;
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
        if (static::$teamCount === false) {
            static::$teamCount = $this->Teams()->count();
        }

        return static::$teamCount + $plus;
    }
}
