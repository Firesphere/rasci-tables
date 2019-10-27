<?php


namespace Firesphere\ISO27001Compliance\Models;


use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
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
     * @todo move this to YML files, because it's quite large :D
     *
     * @var array
     */
    private static $subsidiaries = [
        5  => [
            [
                'SubNo' => '5.1.1',
                'Title' => 'Policies for information security',
            ],
            [
                'SubNo' => '5.1.2',
                'Title' => 'Review of the policies for information security',
            ],
        ],
        6  => [
            [
                'SubNo' => '6.1.1',
                'Title' => 'Information security roles and responsibilities',
            ],
            [
                'SubNo' => '6.1.2',
                'Title' => 'Segregation of duties',
            ],
            [
                'SubNo' => '6.1.3',
                'Title' => 'Contact with authorities',
            ],
            [
                'SubNo' => '6.1.4',
                'Title' => 'Contact with special interest groups',
            ],
            [
                'SubNo' => '6.1.5',
                'Title' => 'Information security in project management',
            ],
            [
                'SubNo' => '6.2.1',
                'Title' => 'Mobile device policy',
            ],
            [
                'SubNo' => '6.2.2',
                'Title' => 'Teleworking',
            ],
        ],
        7  => [
            [
                'SubNo' => '7.1.1',
                'Title' => 'Screening',
            ],
            [
                'SubNo' => '7.1.2',
                'Title' => 'Terms and conditions of employment',
            ],
            [
                'SubNo' => '7.2.1',
                'Title' => 'Management responsibilities',
            ],
            [
                'SubNo' => '7.2.2',
                'Title' => 'Information security awareness, education, and training',
            ],
            [
                'SubNo' => '7.2.3',
                'Title' => 'Disciplinary process',
            ],
            [
                'SubNo' => '7.3.1',
                'Title' => 'Termination or change of employment responsibilities',
            ],
        ],
        8  => [
            [
                'SubNo' => '8.1.1',
                'Title' => 'Inventory of assets',
            ],
            [
                'SubNo' => '8.1.2',
                'Title' => 'Ownership of assets',
            ],
            [
                'SubNo' => '8.1.3',
                'Title' => 'Acceptable use of assets',
            ],
            [
                'SubNo' => '8.1.4',
                'Title' => 'Return of assets',
            ],
            [
                'SubNo' => '8.2.1',
                'Title' => 'Classification of information',
            ],
            [
                'SubNo' => '8.2.2',
                'Title' => 'Labelling of information',
            ],
            [
                'SubNo' => '8.2.3',
                'Title' => 'Handling of assets',
            ],
            [
                'SubNo' => '8.3.1',
                'Title' => 'Management of removable media',
            ],
            [
                'SubNo' => '8.3.2',
                'Title' => 'Disposal of media',
            ],
            [
                'SubNo' => '8.3.3',
                'Title' => 'Physical media transfer',
            ],
        ],
        9  => [
            [
                'SubNo' => '9.1.1',
                'Title' => 'Access control policy',
            ],
            [
                'SubNo' => '9.1.2',
                'Title' => 'Policy on the use of network services',
            ],
            [
                'SubNo' => '9.2.1',
                'Title' => 'User registration and de-registration',
            ],
            [
                'SubNo' => '9.2.2',
                'Title' => 'User access provisioning',
            ],
            [
                'SubNo' => '9.2.3',
                'Title' => 'Privilege management',
            ],
            [
                'SubNo' => '9.2.4',
                'Title' => 'Management of secret authentication information of users',
            ],
            [
                'SubNo' => '9.2.5',
                'Title' => 'Review of user access rights',
            ],
            [
                'SubNo' => '9.2.6',
                'Title' => 'Removal or adjustment of access rights',
            ],
            [
                'SubNo' => '9.3.1',
                'Title' => 'Use of secret authentication information',
            ],
            [
                'SubNo' => '9.4.1',
                'Title' => 'Information access restriction',
            ],
            [
                'SubNo' => '9.4.2',
                'Title' => 'Secure log-on procedures',
            ],
            [
                'SubNo' => '9.4.3',
                'Title' => 'Password management system',
            ],
            [
                'SubNo' => '9.4.4',
                'Title' => 'Use of privileged utility programs',
            ],
            [
                'SubNo' => '9.4.5',
                'Title' => 'Access control to program source code',
            ],
        ],
        10 => [
            [
                'SubNo' => '10.1.1',
                'Title' => 'Policy on the use of cryptographic controls',
            ],
            [
                'SubNo' => '10.1.2',
                'Title' => 'Key management',
            ],
        ],
        11 => [
            [
                'SubNo' => '11.1.1',
                'Title' => 'Physical security perimeter',
            ],
            [
                'SubNo' => '11.1.2',
                'Title' => 'Physical entry controls',
            ],
            [
                'SubNo' => '11.1.3',
                'Title' => 'Securing offices, rooms and facilities',
            ],
            [
                'SubNo' => '11.1.4',
                'Title' => 'Protecting against external and environmental threats',
            ],
            [
                'SubNo' => '11.1.5',
                'Title' => 'Working in secure areas',
            ],
            [
                'SubNo' => '11.1.6',
                'Title' => 'Delivery and loading areas',
            ],
            [
                'SubNo' => '11.2.1',
                'Title' => 'Equipment siting and protection',
            ],
            [
                'SubNo' => '11.2.2',
                'Title' => 'Supporting utilities',
            ],
            [
                'SubNo' => '11.2.3',
                'Title' => 'Cabling security',
            ],
            [
                'SubNo' => '11.2.4',
                'Title' => 'Equipment maintenance',
            ],
            [
                'SubNo' => '11.2.5',
                'Title' => 'Removal of assets',
            ],
            [
                'SubNo' => '11.2.6',
                'Title' => 'Security of equipment and assets off-premises',
            ],
            [
                'SubNo' => '11.2.7',
                'Title' => 'Secure disposal or re-use of equipment',
            ],
            [
                'SubNo' => '11.2.8',
                'Title' => 'Unattended user equipment',
            ],
            [
                'SubNo' => '11.2.9',
                'Title' => 'Clear desk and clear screen policy',
            ],
        ],
        12 => [
            [
                'SubNo' => '12.1.1',
                'Title' => 'Documented operating procedures',
            ],
            [
                'SubNo' => '12.1.2',
                'Title' => 'Change management',
            ],
            [
                'SubNo' => '12.1.3',
                'Title' => 'Capacity management',
            ],
            [
                'SubNo' => '12.1.4',
                'Title' => 'Separation of development, test and operational environments',
            ],
            [
                'SubNo' => '12.2.1',
                'Title' => 'Controls against malware',
            ],
            [
                'SubNo' => '12.3.1',
                'Title' => 'Information backup',
            ],
            [
                'SubNo' => '12.4.1',
                'Title' => 'Event logging',
            ],
            [
                'SubNo' => '12.4.2',
                'Title' => 'Protection of log information',
            ],
            [
                'SubNo' => '12.4.3',
                'Title' => 'Administrator and operator logs',
            ],
            [
                'SubNo' => '12.4.4',
                'Title' => 'Clock synchronization',
            ],
            [
                'SubNo' => '12.5.1',
                'Title' => 'Installation of software on operational systems',
            ],
            [
                'SubNo' => '12.6.1',
                'Title' => 'Management of technical vulnerabilities',
            ],
            [
                'SubNo' => '12.6.2',
                'Title' => 'Restrictions on software installation',
            ],
            [
                'SubNo' => '12.7.1',
                'Title' => 'Information systems audit controls',
            ],
        ],
        13 => [
            [
                'SubNo' => '13.1.1',
                'Title' => 'Network controls',
            ],
            [
                'SubNo' => '13.1.2',
                'Title' => 'Security of network services',
            ],
            [
                'SubNo' => '13.1.3',
                'Title' => 'Segregation in networks',
            ],
            [
                'SubNo' => '13.2.1',
                'Title' => 'Information transfer policies and procedures',
            ],
            [
                'SubNo' => '13.2.2',
                'Title' => 'Agreements on information transfer',
            ],
            [
                'SubNo' => '13.2.3',
                'Title' => 'Electronic messaging',
            ],
            [
                'SubNo' => '13.2.4',
                'Title' => 'Confidentiality or non-disclosure agreements',
            ],
        ],
        14 => [
            [
                'SubNo' => '14.1.1',
                'Title' => 'Security requirements analysis and specification',
            ],
            [
                'SubNo' => '14.1.2',
                'Title' => 'Securing application services on public networks',
            ],
            [
                'SubNo' => '14.1.3',
                'Title' => 'Protecting application services transactions',
            ],
            [
                'SubNo' => '14.2.1',
                'Title' => 'Secure development policy',
            ],
            [
                'SubNo' => '14.2.2',
                'Title' => 'Change control procedures',
            ],
            [
                'SubNo' => '14.2.3',
                'Title' => 'Technical review of applications after operating platform changes',
            ],
            [
                'SubNo' => '14.2.4',
                'Title' => 'Restrictions on changes to software packages',
            ],
            [
                'SubNo' => '14.2.5',
                'Title' => 'System development procedures',
            ],
            [
                'SubNo' => '14.2.6',
                'Title' => 'Secure development environment',
            ],
            [
                'SubNo' => '14.2.7',
                'Title' => 'Outsourced development',
            ],
            [
                'SubNo' => '14.2.8',
                'Title' => 'System security testing',
            ],
            [
                'SubNo' => '14.2.9',
                'Title' => 'System acceptance testing',
            ],
            [
                'SubNo' => '14.3.1',
                'Title' => 'Protection of test data',
            ],
        ],
        15 => [
            [
                'SubNo' => '15.1.1',
                'Title' => 'Information security policy for supplier relationships',
            ],
            [
                'SubNo' => '15.1.2',
                'Title' => 'Addressing security within supplier agreements',
            ],
            [
                'SubNo' => '15.1.3',
                'Title' => 'Information and communication technology supply chain',
            ],
            [
                'SubNo' => '15.2.1',
                'Title' => 'Monitoring and review of supplier services',
            ],
            [
                'SubNo' => '15.2.2',
                'Title' => 'Managing changes to supplier services',
            ],
        ],
        16 => [
            [
                'SubNo' => '16.1.1',
                'Title' => 'Responsibilities and procedures',
            ],
            [
                'SubNo' => '16.1.2',
                'Title' => 'Reporting information security events',
            ],
            [
                'SubNo' => '16.1.3',
                'Title' => 'Reporting information security weaknesses',
            ],
            [
                'SubNo' => '16.1.4',
                'Title' => 'Assessment of and decision on information security events',
            ],
            [
                'SubNo' => '16.1.5',
                'Title' => 'Response to information security incidents',
            ],
            [
                'SubNo' => '16.1.6',
                'Title' => 'Learning from information security incidents',
            ],
            [
                'SubNo' => '16.1.7',
                'Title' => 'Collection of evidence',
            ],
        ],
        17 => [
            [
                'SubNo' => '17.1.1',
                'Title' => 'Planning information security continuity',
            ],
            [
                'SubNo' => '17.1.2',
                'Title' => 'Implementing information security continuity',
            ],
            [
                'SubNo' => '17.1.3',
                'Title' => 'Verify, review, and evaluate information security continuity',
            ],
            [
                'SubNo' => '17.2.1',
                'Title' => 'Availability of information processing facilities',
            ],
        ],
        18 => [
            [
                'SubNo' => '18.1.1',
                'Title' => 'Identification of applicable legislation and contractual requirements',
            ],
            [
                'SubNo' => '18.1.2',
                'Title' => 'Intellectual property rights (IPR)',
            ],
            [
                'SubNo' => '18.1.3',
                'Title' => 'Protection of records',
            ],
            [
                'SubNo' => '18.1.4',
                'Title' => 'Privacy and protection of personal information',
            ],
            [
                'SubNo' => '18.1.5',
                'Title' => 'Regulation of cryptographic controls',
            ],
            [
                'SubNo' => '18.2.1',
                'Title' => 'Independent review of information security',
            ],
            [
                'SubNo' => '18.2.2',
                'Title' => 'Compliance with security policies and standards',
            ],
            [
                'SubNo' => '18.2.3',
                'Title' => 'Technical compliance inspection',
            ],
        ],
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

    public function onAfterWrite()
    {
        parent::onAfterWrite();
        if (!$this->Subsidiaries()->count() && !empty(self::$subsidiaries[$this->AnnexNo])) {
            $subsidiary = self::$subsidiaries[$this->AnnexNo];
            foreach ($subsidiary as $item) {
                $subs = Subsidiary::create($item);
                $subs->AnnexChapterID = $this->ID;
                $subs->write();
            }
        }
    }
}
