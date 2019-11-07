<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\AnnexPage;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationException;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\RASCI
 *
 * @property string $Value
 * @property int $TeamID
 * @property int $SubsidiaryID
 * @property int $AnnexPageID
 * @method Team Team()
 * @method Subsidiary Subsidiary()
 * @method AnnexPage AnnexPage()
 */
class RASCI extends DataObject
{
    /**
     * @var string
     */
    private static $table_name = 'ISO27k1RASCI';

    /**
     * @var array
     */
    private static $db = [
        'Value' => 'Enum(",R,A,S,C,I")',
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'Team'       => Team::class,
        'Subsidiary' => Subsidiary::class,
        'AnnexPage'  => AnnexPage::class,
    ];

    /**
     * @param string $value
     * @param int $team
     * @param int $subsidiary
     * @param int $pageID
     * @return int
     * @throws ValidationException
     */
    public static function findOrCreate($value, $team, $subsidiary, $pageID)
    {
        $data = [
            'TeamID'       => $team,
            'SubsidiaryID' => $subsidiary,
            'AnnexPageID'  => $pageID,
        ];
        $self = self::get()->filter($data)->first();
        if (!$self) {
            $self = self::create($data);
        }

        $return = $self->update(['Value' => $value]);

        return $return->write();
    }

    /**
     * @param null|Member $member
     * @return bool
     */
    public function canEdit($member = null)
    {
        return parent::canEdit($member);
    }
}
