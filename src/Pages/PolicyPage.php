<?php


namespace Firesphere\ISO27001Compliance\Pages;


use Firesphere\ISO27001Compliance\Models\Subsidiary;
use Page;

class PolicyPage extends Page
{

    private static $many_many = [
        'Subsidiaries' => Subsidiary::class
    ];
}
