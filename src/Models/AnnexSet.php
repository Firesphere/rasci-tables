<?php


namespace Firesphere\ISO27001Compliance\Models;


use Firesphere\ISO27001Compliance\Pages\AnnexPage;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;
use SilverStripe\Security\Member;

/**
 * Class \Firesphere\ISO27001Compliance\Models\AnnexSet
 *
 * @property string $Title
 * @method AnnexPage Page()
 * @method DataList|AnnexChapter[] AnnexChapters()
 * @method ManyManyList|Team[] Teams()
 */
class AnnexSet extends DataObject
{
    protected static $teamCount = false;

    protected static $annexes = [
        [
            'Title'     => 'Information security policies',
            'Number'    => '5',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-5-information-security-policies/',
        ],
        [
            'Title'     => 'Organizing information security',
            'Number'    => '6',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-6-organisation-information-security/',
        ],
        [
            'Title'     => 'Human resource security',
            'Number'    => '7',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-7-human-resource-security/',
        ],
        [
            'Title'     => 'Asset Management',
            'Number'    => '8',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-8-asset-management/',
        ],
        [
            'Title'     => 'Access control',
            'Number'    => '9',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-9-access-control/',
        ],
        [
            'Title'     => 'Cryptography',
            'Number'    => '10',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-10-cryptography/',
        ],
        [
            'Title'     => 'Physical and environmental security',
            'Number'    => '11',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-11-physical-and-environmental-security/',
        ],
        [
            'Title'     => 'Operations security',
            'Number'    => '12',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-12-operations-security/',
        ],
        [
            'Title'     => 'Communications security',
            'Number'    => '13',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-13-communications-security/',
        ],
        [
            'Title'     => 'System acquisition, development and maintenance',
            'Number'    => '14',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-14-system-acquisition-development-and-maintenance/',
        ],
        [
            'Title'     => 'Supplier relationships',
            'Number'    => '15',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-15-supplier-relationships/',
        ],
        [
            'Title'     => 'Information security incident management',
            'Number'    => '16',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-16-information-security-incident-management/',
        ],
        [
            'Title'     => 'Information security aspects of business continuity management',
            'Number'    => '17',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-17-information-security-aspects-of-business-continuity-management/',
        ],
        [
            'Title'     => 'Compliance',
            'Number'    => '18',
            'Reference' => 'https://www.isms.online/iso-27001/annex-a-18-compliance/',
        ],
    ];

    private static $table_name = 'ISO27k1AnnexSet';

    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    private static $belongs_to = [
        'Page' => AnnexPage::class,
    ];

    private static $has_many = [
        'AnnexChapters' => AnnexChapter::class,
    ];

    private static $many_many = [
        'Teams' => Team::class,
    ];

    public function onAfterWrite()
    {
        if (!$this->AnnexChapters()->count()) {
            foreach (static::$annexes as $annex) {
                AnnexChapter::create([
                    'Title'      => $annex['Title'],
                    'AnnexNo'    => $annex['Number'],
                    'AnnexSetID' => $this->ID,
                    'Reference'  => $annex['Reference'],
                ])->write();
            }

            foreach (Team::get() as $team) {
                $this->Teams()->add($team);
            }
        }
        parent::onAfterWrite();
    }

    /**
     * @param null|Member $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return false;
    }

    public function getTeamCount($plus = 0)
    {
        if (static::$teamCount === false) {
            static::$teamCount = $this->Teams()->count();
        }

        return static::$teamCount + $plus;
    }
}
