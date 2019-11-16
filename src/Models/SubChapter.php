<?php


namespace Firesphere\ISO27001Compliance\Models;

use SilverStripe\ORM\DataObject;

/**
 * Class \Firesphere\ISO27001Compliance\Models\SubChapter
 *
 * @property float $SubNo
 * @property string $Title
 * @property string $Description
 * @method Subsidiary Subsidiary()
 */
class SubChapter extends DataObject
{
    private static $table_name = 'ISO27k1SubChapter';

    private static $db = [
        'SubNo'       => 'Decimal(3,1)',
        'Title'       => 'Varchar(255)',
        'Description' => 'HTMLText',
    ];

    private static $belongs_to = [
        'Subsidiary' => Subsidiary::class,
    ];

    private static $indexes = [
        'SubNo' => true,
    ];

    private static $default_records = [
        [
            'SubNo' => '5.1',
            'Title' => 'Management direction for information security',
        ],
        [
            'SubNo' => '6.1',
            'Title' => 'Internal organization',
        ],
        [
            'SubNo' => '6.2',
            'Title' => 'Mobile devices and teleworking',
        ],
        [
            'SubNo' => '7.1',
            'Title' => 'Prior to employment',
        ],
        [
            'SubNo' => '7.2',
            'Title' => 'During employment',
        ],
        [
            'SubNo' => '7.3',
            'Title' => 'Termination and change of employment',
        ],
        [
            'SubNo' => '8.1',
            'Title' => 'Responsibility for assets',
        ],
        [
            'SubNo' => '8.2',
            'Title' => 'Information classification',
        ],
        [
            'SubNo' => '8.3',
            'Title' => 'Media handling',
        ],
        [
            'SubNo' => '9.1',
            'Title' => 'Business requirements of access control',
        ],
        [
            'SubNo' => '9.2',
            'Title' => 'User access management',
        ],
        [
            'SubNo' => '9.3',
            'Title' => 'User responsibilities',
        ],
        [
            'SubNo' => '9.4',
            'Title' => 'System and application access control',
        ],
        [
            'SubNo' => '10.1',
            'Title' => 'Cryptographic controls',
        ],
        [
            'SubNo' => '11.1',
            'Title' => 'Secure areas',
        ],
        [
            'SubNo' => '11.2',
            'Title' => 'Equipment',
        ],
        [
            'SubNo' => '12.1',
            'Title' => 'Operational procedures and responsibilities',
        ],
        [
            'SubNo' => '12.2',
            'Title' => 'Protection from malware',
        ],
        [
            'SubNo' => '12.3',
            'Title' => 'Backup',
        ],
        [
            'SubNo' => '12.4',
            'Title' => 'Logging and monitoring',
        ],
        [
            'SubNo' => '12.5',
            'Title' => 'Control of operational software',
        ],
        [
            'SubNo' => '12.6',
            'Title' => 'Technical vulnerability management',
        ],
        [
            'SubNo' => '12.7',
            'Title' => 'Information systems audit considerations',
        ],
        [
            'SubNo' => '13.1',
            'Title' => 'Network security management',
        ],
        [
            'SubNo' => '13.2',
            'Title' => 'Information transfer',
        ],
        [
            'SubNo' => '14.1',
            'Title' => 'Security requirements of information systems',
        ],
        [
            'SubNo' => '14.2',
            'Title' => 'Security in development and support processes',
        ],
        [
            'SubNo' => '14.3',
            'Title' => 'Test data',
        ],
        [
            'SubNo' => '15.1',
            'Title' => 'Information security in supplier relationships',
        ],
        [
            'SubNo' => '15.2',
            'Title' => 'Supplier service delivery management',
        ],
        [
            'SubNo' => '16.1',
            'Title' => 'Management of information security incidents and improvements',
        ],
        [
            'SubNo' => '17.1',
            'Title' => 'Information security continuity',
        ],
        [
            'SubNo' => '17.2',
            'Title' => 'Redundancies',
        ],
        [
            'SubNo' => '18.1',
            'Title' => 'Compliance with legal and contractual requirements',
        ],
        [
            'SubNo' => '18.2',
            'Title' => 'Information security reviews',
        ],
    ];
}
