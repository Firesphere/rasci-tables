<?php


namespace Firesphere\ISO27001Compliance\Models;


use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

/**
 * Class \Firesphere\ISO27001Compliance\Models\Team
 *
 * @property string $Name
 * @method DataList|RASCI[] RASCI()
 * @method ManyManyList|AnnexSet[] AnnexSet()
 */
class Team extends DataObject
{

    private static $table_name = 'ISO27k1Team';

    private static $db = [
        'Name' => 'Varchar(255)',
    ];

    private static $has_many = [
        'RASCI' => RASCI::class,
    ];

    private static $belongs_many_many = [
        'AnnexSet' => AnnexSet::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['RASCI', 'AnnexSet']);

        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->AnnexSet()->add(AnnexSet::get()->first());
    }

    public function TotalItems($val) {
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
