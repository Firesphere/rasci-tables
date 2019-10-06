<?php


namespace Firesphere\ISO27001Compliance\Models;


use SilverStripe\ORM\DataObject;

/**
 * Class \Firesphere\ISO27001Compliance\Models\SubChapter
 *
 * @property string $SubNo
 * @property string $Title
 * @property string $Description
 * @method Subsidiary Subsidiary()
 */
class SubChapter extends DataObject
{
    private static $table_name = 'ISO27k1SubChapter';

    private static $db = [
        'SubNo'       => 'Varchar(10)',
        'Title'       => 'Varchar(255)',
        'Description' => 'HTMLText',
    ];

    private static $belongs_to = [
        'Subsidiary' => Subsidiary::class,
    ];

    private static $default_records = [
        [
            'SubNo'       => '5.1',
            'Title'       => 'Management direction for information security',
            'Description' => '<p><b>Objective:</b> To provide management direction and support for information security in accordance with business requirements and relevant laws and regulations.</p>',
        ],
        [
            'SubNo'       => '6.1',
            'Title'       => 'Internal organization',
            'Description' => '<p><b>Objective:</b> To establish a management framework to initiate and control the implementation and operation of information security within the organization.</p>',
        ],
        [
            'SubNo'       => '6.2',
            'Title'       => 'Mobile devices and teleworking',
            'Description' => '<p><b>Objective:</b> To ensure the security of teleworking and use of mobile devices.</p>',
        ],
        [
            'SubNo'       => '7.1',
            'Title'       => 'Prior to employment',
            'Description' => '<p><b>Objective:</b> To ensure that employees and contractors understand their responsibilities and are suitable for the roles for which they are considered.</p>',
        ],
        [
            'SubNo'       => '7.2',
            'Title'       => 'During employment',
            'Description' => '<p><b>Objective:</b> To ensure that employees and contractors are aware of and fulfil their information security responsibilities.</p>',
        ],
        [
            'SubNo'       => '7.3',
            'Title'       => 'Termination and change of employment',
            'Description' => '<p><b>Objective:</b> To protect the organization\'s interests as part of the process of changir or terminating employment.</p>',
        ],
        [
            'SubNo'       => '8.1',
            'Title'       => 'Responsibility for assets',
            'Description' => '<p><b>Objective:</b> To identify organizational assets and define appropriate protection responsibilities.</p>',
        ],
        [
            'SubNo'       => '',
            'Title'       => '',
            'Description' => '<p><b>Objective:</b> </p>',
        ],
    ];
}
