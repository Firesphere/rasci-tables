<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\AnnexPage;
use SilverStripe\ORM\DataObject;

/**
 * Class \Firesphere\ISO27001Compliance\Models\RASCI
 *
 * @property string $Value
 * @property int $TeamID
 * @property int $SubsidiaryID
 * @method Team Team()
 * @method Subsidiary Subsidiary()
 */
class RASCI extends DataObject
{
    private static $table_name = 'RASCI';

    private static $db = [
        'Value' => 'Enum(",R,A,S,C,I")',
    ];

    private static $has_one = [
        'Team'       => Team::class,
        'Subsidiary' => Subsidiary::class,
    ];

    public static function findOrCreate($value, $team, $subsidiary)
    {
        $data = [
            'TeamID'       => $team,
            'SubsidiaryID' => $subsidiary,
        ];
        $self = self::get()->filter($data)->first();
        if (!$self) {
            $self = self::create();
        }
        $self->update(array_merge(
                $data,
                ['Value' => $value]
            )
        )->write();
    }
}
