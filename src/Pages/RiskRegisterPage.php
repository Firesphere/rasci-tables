<?php


namespace Firesphere\ISO27001Compliance\Pages;


use Firesphere\ISO27001Compliance\Models\Risk;
use Page;

/**
 * Class \Firesphere\ISO27001Compliance\Pages\RiskRegisterPage
 *
 * @method DataList|Risk[] Risks()
 */
class RiskRegisterPage extends Page
{

    private static $has_many = [
        'Risks' => Risk::class
    ];

}
