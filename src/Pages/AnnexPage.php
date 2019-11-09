<?php


namespace Firesphere\ISO27001Compliance\Pages;


use Firesphere\ISO27001Compliance\Controllers\AnnexPageController;
use Firesphere\ISO27001Compliance\Models\AnnexSet;
use Firesphere\ISO27001Compliance\Models\RASCI;
use Page;
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
        return md5($this->ID . $this->RASCI()->max('LastEdited'));
    }
}
