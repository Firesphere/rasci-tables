<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\PolicyPage;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\Subsidiary
 *
 * @property string $SubNo
 * @property string $Title
 * @property string $Lead
 * @property int $AnnexChapterID
 * @method AnnexChapter AnnexChapter()
 * @method DataList|RASCI[] RASCI()
 */
class Subsidiary extends DataObject
{

    private static $table_name = 'ISO27k1Subsidiary';

    private static $db = [
        'SubNo' => 'Varchar(10)',
        'Title' => 'Varchar(255)',
        'Owner' => 'Varchar(255)',
    ];

    private static $has_one = [
        'AnnexChapter' => AnnexChapter::class,
    ];

    private static $has_many = [
        'RASCI' => RASCI::class,
    ];

    private static $belongs_many_many = [
        'PolicyPages' => PolicyPage::class,
    ];

    /**
     * @param null|Member $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return false;
    }

}
