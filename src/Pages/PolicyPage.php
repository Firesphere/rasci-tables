<?php


namespace Firesphere\ISO27001Compliance\Pages;


use Firesphere\ISO27001Compliance\Models\Revision;
use Firesphere\ISO27001Compliance\Models\Subsidiary;
use Page;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\ManyManyList;
use SilverStripe\Security\Member;
use Symbiote\GridFieldExtensions\GridFieldAddNewInlineButton;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
use Symbiote\GridFieldExtensions\GridFieldTitleHeader;

/**
 * Class \Firesphere\ISO27001Compliance\Pages\PolicyPage
 *
 * @method DataList|Revision[] Revisions()
 * @method ManyManyList|Subsidiary[] Subsidiaries()
 */
class PolicyPage extends Page
{

    private static $table_name = 'ISO27k1PolicyPage';

    private static $has_many = [
        'Revisions' => Revision::class,
    ];

    private static $many_many = [
        'Subsidiaries' => Subsidiary::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $inlineAddButton = new GridFieldEditableColumns();
        $inlineAddButton->setDisplayFields([
            'Version'      => [
                'title'    => 'Version',
                'callback' => function ($record, $column, $grid) {
                    return TextField::create($column);
                },
            ],
            'RevisionDate' => [
                'title'    => 'Revision Date',
                'callback' => function ($record, $column, $grid) {
                    return DateField::create($column);
                },
            ],
            'AuthorID'     => [
                'title'    => 'Author',
                'callback' => function ($record, $column, $grid) {
                    return DropdownField::create($column, '', Member::get()->map('ID', 'Name'));
                },
            ],
            'SignOff'      => [
                'title'    => 'Signed off by',
                'callback' => function ($record, $column, $grid) {
                    return TextField::create($column);
                },
            ],
        ]);
        $gridFieldConfig = GridFieldConfig::create()
            ->addComponent(new GridFieldButtonRow('before'))
            ->addComponent(new GridFieldToolbarHeader())
            ->addComponent(new GridFieldTitleHeader())
            ->addComponent($inlineAddButton)
            ->addComponent(new GridFieldDeleteAction())
            ->addComponent(new GridFieldAddNewInlineButton());
        $gridField = new GridField('Revisions', 'Revisions', $this->Revisions(), $gridFieldConfig);

        $fields->addFieldToTab('Root.Main', $gridField, 'ElementalArea');
        $fields->addFieldToTab('Root.Main', LiteralField::create('spacer', '<p><hr /></p>'), 'ElementalArea');

        $subsidiaryConfig = new GridFieldConfig_RelationEditor();
        $subsidiary = new GridField('Subsidiaries', false, $this->Subsidiaries(), $subsidiaryConfig);

        $fields->addFieldToTab('Root.Subsidiaries', $subsidiary);

        return $fields;
    }
}
