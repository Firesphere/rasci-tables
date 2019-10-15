<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\PolicyPage;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\Revision
 *
 * @property string $Version
 * @property string $SignOff
 * @property string $RevisionDate
 * @property int $PolicyPageID
 * @property int $AuthorID
 * @method PolicyPage PolicyPage()
 * @method Member Author()
 */
class Revision extends DataObject
{
    private static $table_name = 'Revision';

    private static $db = [
        'Version'      => 'Varchar(15)',
        'SignOff'      => 'Varchar(255)',
        'RevisionDate' => 'Date',
    ];

    private static $has_one = [
        'PolicyPage' => PolicyPage::class,
        'Author'     => Member::class,
    ];

    private static $summary_fields = [
        'Version',
        'RevisionDate',
        'Author.Name',
        'SignOff',
    ];
}
