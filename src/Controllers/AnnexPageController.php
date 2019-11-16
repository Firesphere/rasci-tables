<?php


namespace Firesphere\ISO27001Compliance\Controllers;

use Firesphere\ISO27001Compliance\Models\RASCI;
use Firesphere\ISO27001Compliance\Pages\AnnexPage;
use PageController;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\ValidationException;
use SilverStripe\View\Requirements;

/**
 * Class \Firesphere\ISO27001Compliance\Controllers\AnnexPageController
 *
 */
class AnnexPageController extends PageController
{
    /**
     * @var int|null
     */
    public $compare = 0;

    /**
     * @var null|AnnexPage
     */
    public $comparePage;

    private static $allowed_actions = [
        'SaveForm',
    ];

    public function init()
    {
        parent::init();
        $this->compare = $this->getRequest()->getVar('compare');
        if ($this->compare) {
            $this->comparePage = AnnexPage::get()->byID($this->compare);
        }
        Requirements::css('firesphere/iso-compliance:dist/css/main.css');
        Requirements::javascript('firesphere/iso-compliance:dist/js/main.js');
    }

    public function SaveForm()
    {
        $fields = FieldList::create();
        $actions = FieldList::create([FormAction::create('process', 'Save')]);

        return Form::create($this, __FUNCTION__, $fields, $actions);
    }

    public function CompareForm()
    {
        $comparison = AnnexPage::get()->exclude(['ID' => $this->ID])->map('ID', 'Title')->toArray();
        if (count($comparison)) {
            $fields = FieldList::create([
                $select = DropdownField::create('compare', '', $comparison, $this->compare)
            ]);

            $select->setDescription(_t(
                static::class . '.COMPAREWARNING',
                '<b>Note</b><br />This only compares teams that are in both sets.<br /> 
                Any team from the compared set that are not in this set, will be ignored.
                Teams that are in this set, but not in the other set, will be marked as not being a shared team.'
            ));
            $select->setEmptyString('-- Select an Annex set to compare against --');

            $actions = FieldList::create([FormAction::create('go', 'Compare')]);

            $form = Form::create($this, __FUNCTION__, $fields, $actions);

            $form->setFormMethod('GET');

            $form->setFormAction($this->Link());

            $form->disableSecurityToken();

            return $form;
        }
    }

    /**
     * @param array $data
     * @param Form $form
     * @return DBHTMLText
     * @throws ValidationException
     */
    public function process($data, $form)
    {
        $items = [];
        foreach ($data['rasci-value'] as $value) {
            if ($value !== '') {
                $values = explode('-', $value);
                $items[] = RASCI::findOrCreate(
                    $values[0],
                    (int)$values[1],
                    (int)$values[2],
                    (int)$this->dataRecord->ID
                );
            }
        }

        if (count($items)) {
            $this->dataRecord->RASCI()->exclude(['ID' => $items])->removeAll();
        }

        return $this->renderWith('Includes/TotalsTable');
    }
}
