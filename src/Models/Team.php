<?php


namespace Firesphere\ISO27001Compliance\Models;

use SilverStripe\Control\Controller;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

/**
 * Class \Firesphere\ISO27001Compliance\Models\Team
 *
 * @property string $Name
 * @property int $SortOrder
 * @method DataList|RASCI[] RASCI()
 * @method ManyManyList|AnnexSet[] AnnexSet()
 */
class Team extends DataObject
{
    public static $selected = [];

    private static $table_name = 'ISO27k1Team';

    private static $key;

    private static $db = [
        'Name'      => 'Varchar(255)',
        'SortOrder' => 'Int',
    ];

    private static $has_many = [
        'RASCI' => RASCI::class,
    ];

    private static $belongs_many_many = [
        'AnnexSet' => AnnexSet::class,
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $default_records = [
        [
            'Name' => 'HR',
        ],
        [
            'Name' => 'Information Security',
        ],
        [
            'Name' => 'Operational Security',
        ],
        [
            'Name' => 'All Staff',
        ],
        [
            'Name' => 'Finances',
        ],
        [
            'Name' => 'Legal',
        ],
        [
            'Name' => 'Information asset owners',
        ],
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['RASCI', 'AnnexSet', 'SortOrder']);

        return $fields;
    }

    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if (!$this->AnnexSet()->count()) {
            $sets = AnnexSet::get();
            foreach ($sets as $set) {
                $this->AnnexSet()->add($set);
            }
        }
    }

    public function TotalItems($val)
    {
        $id = Controller::curr()->ID;

        return $this->RASCI()->filter(['Value' => $val, 'AnnexPageID' => $id])->count();
    }

    public function TotalRASCI()
    {
        $id = Controller::curr()->ID;

        return $this->RASCI()->filter(['AnnexPageID' => $id])->count();
    }

    public function SelectedRASCI($subsidiary)
    {
        if (!isset(static::$selected[$this->ID])) {
            static::$selected[$this->ID] = $this->RASCI()->map('SubsidiaryID', 'Value')->toArray();
        }

        return (isset(static::$selected[$this->ID][$subsidiary])) ? static::$selected[$this->ID][$subsidiary] : false;
    }
}
