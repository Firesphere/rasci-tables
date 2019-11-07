<?php


namespace Firesphere\ISO27001Compliance\Models;


use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationException;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\AnnexChapter
 *
 * @property int $AnnexNo
 * @property string $Title
 * @property string $Reference
 * @property int $AnnexSetID
 * @method AnnexSet AnnexSet()
 * @method DataList|Subsidiary[] Subsidiaries()
 */
class AnnexChapter extends DataObject
{

    private static $table_name = 'ISO27k1Chapter';

    private static $db = [
        'AnnexNo'   => 'Int',
        'Title'     => 'Varchar(255)',
        'Reference' => 'Varchar(255)',
    ];

    private static $has_one = [
        'AnnexSet' => AnnexSet::class,
    ];

    private static $has_many = [
        'Subsidiaries' => Subsidiary::class,
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

    /**
     * @throws ValidationException
     */
    public function onAfterWrite()
    {
        parent::onAfterWrite();
        $subsidiaries = self::config()->get('subsidiaries');
        if (!$this->Subsidiaries()->count() && !empty($subsidiaries[$this->AnnexNo])) {
            $subsidiary = $subsidiaries[$this->AnnexNo];
            foreach ($subsidiary as $item) {
                $subs = Subsidiary::create($item);
                $subs->AnnexChapterID = $this->ID;
                $subs->write();
            }
        }
    }
}
