<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\PolicyPage;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\Subsidiary
 *
 * @property string $SubNo
 * @property string $Title
 * @property string $Owner
 * @property int $AnnexChapterID
 * @property int $SubChapterID
 * @method AnnexChapter AnnexChapter()
 * @method SubChapter SubChapter()
 * @method DataList|RASCI[] RASCI()
 * @method ManyManyList|PolicyPage[] PolicyPages()
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
        'SubChapter'   => SubChapter::class,
    ];

    private static $has_many = [
        'RASCI' => RASCI::class,
    ];

    private static $belongs_many_many = [
        'PolicyPages' => PolicyPage::class,
    ];

    private static $summary_fields = [
        'SubNo',
        'Title',
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

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $sub = (int)substr($this->SubNo, -1);
        if (!$this->SubChapter()->count && $sub === 1) {
            $find = substr($this->SubNo, 0, -2);
            $subChapter = SubChapter::get()->filter(['SubNo' => $find])->first();
            if ($subChapter) {
                $this->SubChapterID = $subChapter->ID;
            }
        }
    }
}
