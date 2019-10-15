<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\RiskRegisterPage;
use SilverStripe\ORM\DataObject;

/**
 * Class \Firesphere\ISO27001Compliance\Models\Risk
 *
 * @property int $RiskNumber
 * @property string $Name
 * @property int $RiskRegisterPageID
 * @method RiskRegisterPage RiskRegisterPage()
 */
class Risk extends DataObject
{
    private static $table_name = 'ISO27k1Risk';

    private static $db = [
        'RiskNumber' => 'Int',
        'Name' => 'Varchar(255)'
    ];

    private static $has_one = [
        'RiskRegisterPage' => RiskRegisterPage::class
    ];
}
