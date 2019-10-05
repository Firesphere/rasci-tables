<?php


namespace Firesphere\ISO27001Compliance\Models;


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

    private static $table_name = 'ISO27k1Team';

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

    private static $default_sort = 'SortOrder ASC';

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
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['RASCI', 'AnnexSet', 'SortOrder']);

        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->AnnexSet()->add(AnnexSet::get()->first());
    }

    public function TotalItems($val)
    {
        return $this->RASCI()->filter(['Value' => $val])->count();
    }

    public function IsSelected($val, $subsidiary)
    {
        $rasci = $this->RASCI()->filter(['SubsidiaryID' => $subsidiary])->first();

        if ($rasci) {
            return $val === $rasci->Value;
        }

        return false;
    }
}
