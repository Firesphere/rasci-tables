<?php


namespace Firesphere\ISO27001Compliance\Pages;

use Firesphere\ISO27001Compliance\Controllers\AnnexPageController;
use Firesphere\ISO27001Compliance\Models\AnnexSet;
use Firesphere\ISO27001Compliance\Models\RASCI;
use Firesphere\ISO27001Compliance\Models\Subsidiary;
use Page;
use SilverStripe\Control\Controller;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataList;

/**
 * Class \Firesphere\ISO27001Compliance\Pages\AnnexPage
 *
 * @property int $AnnexID
 * @method AnnexSet Annex()
 * @method DataList|RASCI[] RASCI()
 */
class AnnexPage extends Page
{
    public static $teamNames = [];
    /**
     * @var array|ArrayList
     */
    protected static $compareTeamRASCI = [];
    protected static $subNoSubs = [];
    private static $table_name = 'ISO27k1AnnexPage';
    private static $singular_name = "RASCI Page";
    private static $plural_name = 'RASCI Pages';
    private static $description = 'Tool page for assigning the RASCI to Annexes of the ISO27001';
    private static $has_one = [
        'Annex' => AnnexSet::class,
    ];

    private static $has_many = [
        'RASCI' => RASCI::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['RASCI', 'AnnexID']);

        return $fields;
    }

    public function onBeforeWrite()
    {
        if (!$this->AnnexID) {
            $annex = AnnexSet::create(['Title' => $this->Title . ' Annex']);
            $this->AnnexID = $annex->write();
        }
        parent::onBeforeWrite();
    }

    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if ($this->isChanged('Title')) {
            $this->Annex()->Title = $this->Title . ' Annex';
            $this->Annex()->write();
        }
    }


    public function getNonBaseTeams()
    {
        $isOtherTeam = $this->ID === Controller::curr()->dataRecord->ID;
        if (!$isOtherTeam) {
            $otherTeams = Controller::curr()->dataRecord->Annex()->Teams()->column('ID');
        } else {
            $otherTeams = Controller::curr()->comparePage->Annex()->Teams()->column('ID');
        }

        return $this->Annex()->Teams()->exclude(['ID' => $otherTeams]);
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        return AnnexPageController::class;
    }

    /**
     * @return string
     */
    public function cacheKey()
    {
        return md5(
            $this->ID .
            $this->RASCI()->max('LastEdited') .
            Controller::curr()->getRequest()->getVar('compare')
        );
    }

    /**
     * Return the compared value, or striped if it is empty
     * @param $subsidiary
     * @param $team
     * @return string
     */
    public function CompareValue($subsidiary, $team)
    {
        if (!in_array($team, array_values(static::$teamNames))) {
            return 'striped';
        }

        if (empty(static::$compareTeamRASCI)) {
            static::$compareTeamRASCI = ArrayList::create($this->RASCI()->toArray());
        }
        if (!isset(static::$subNoSubs[$subsidiary])) {
            $rasciSub = Subsidiary::get()->byID($subsidiary);
            static::$subNoSubs[$subsidiary] = Subsidiary::get()
                ->filter(['SubNo' => $rasciSub->SubNo])
                ->column('ID');
        }

        $RASCI = static::$compareTeamRASCI->filter([
            'SubsidiaryID' => static::$subNoSubs[$subsidiary],
            'TeamID'       => $team
        ])->first();

        return ($RASCI && !empty($RASCI->Value)) ? $RASCI->Value : 'Not set';
    }

    /**
     * Check if this Annex has a team with the same name
     * @param $title
     * @return bool
     */
    public function hasTeam($title)
    {
        if (!static::$teamNames) {
            static::$teamNames = $this->Annex()->Teams()->map('Name', 'ID')->toArray();
        }

        return array_key_exists($title, static::$teamNames);
    }

    /**
     * @param $type
     * @return int
     */
    public function getTotals($type)
    {
        return $this->RASCI()->filter(['Value' => $type])->count();
    }

    public function getTotalRASCI()
    {
        return $this->RASCI()->count();
    }
}
