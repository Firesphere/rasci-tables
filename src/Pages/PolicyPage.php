<?php


namespace Firesphere\ISO27001Compliance\Pages;


use Firesphere\ISO27001Compliance\Models\Subsidiary;
use Page;
use SilverStripe\ORM\ManyManyList;

/**
 * Class \Firesphere\ISO27001Compliance\Pages\PolicyPage
 *
 * @method ManyManyList|Subsidiary[] Subsidiaries()
 */
class PolicyPage extends Page
{

    private static $table_name = 'ISO27k1PolicyPage';

    private static $many_many = [
        'Subsidiaries' => Subsidiary::class,
    ];
}
