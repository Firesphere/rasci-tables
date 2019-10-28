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
 * @property string $Lead
 * @property int $AnnexChapterID
 * @property int $SubChapterID
 * @method AnnexChapter AnnexChapter()
 * @method SubChapter SubChapter()
 * @method DataList|RASCI[] RASCI()
 * @method ManyManyList|PolicyPage[] PolicyPages()
 */
class Subsidiary extends DataObject
{

    protected static $teams = false;
    private static $table_name = 'ISO27k1Subsidiary';

    private static $db = [
        'SubNo' => 'Varchar(10)',
        'Title' => 'Varchar(255)',
        'Lead'  => 'Varchar(255)',
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

    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);
        $labels = array_merge($labels, [
            'SubNo'          => _t(self::class . '.SubNo', 'SubNo'),
            'Title'          => _t(self::class . '.Title', 'Title'),
            'Lead'           => _t(self::class . '.Lead', 'Lead'),
            'AnnexChapterID' => _t(self::class . '.AnnexChapter', 'AnnexChapter'),
            'SubChapter'     => _t(self::class . '.SubChapter', 'SubChapter'),
        ]);

        return $labels;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['PolicyPages', 'RASCI']);

        $fields->DataFieldByName('SubNo')->setReadonly(true);
        $fields->DataFieldByName('SubNo')->setDisabled(true);
        $fields->DataFieldByName('SubChapterID')->setReadonly(true);
        $fields->DataFieldByName('SubChapterID')->setDisabled(true);
        $fields->DataFieldByName('AnnexChapterID')->setReadonly(true);
        $fields->DataFieldByName('AnnexChapterID')->setDisabled(true);

        return $fields;
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

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $sub = (int)substr($this->SubNo, -1);
        if (!$this->SubChapter()->exists() && $sub === 1) {
            $find = substr($this->SubNo, 0, -2);
            $subChapter = SubChapter::get()->filter(['SubNo' => $find])->first();
            if ($subChapter) {
                $this->SubChapterID = $subChapter->ID;
            }
        }
    }

    public function getSubsidiaryTeam()
    {
        if (!static::$teams) {
            static::$teams = Team::get();
        }

        return static::$teams;
    }
}
