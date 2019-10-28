<?php


namespace Firesphere\ISO27001Compliance\Controllers;


use Firesphere\ISO27001Compliance\Models\RASCI;
use PageController;
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

    private static $allowed_actions = [
        'SaveForm',
    ];

    public function init()
    {
        parent::init();
        Requirements::css('firesphere/iso-compliance:dist/css/main.css');
        Requirements::javascript('firesphere/iso-compliance:dist/js/main.js');
    }

    public function SaveForm()
    {
        $fields = FieldList::create();
        $actions = FieldList::create([FormAction::create('process', 'Save')]);

        return Form::create($this, __FUNCTION__, $fields, $actions);
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
                $items[] = RASCI::findOrCreate($values[0], (int)$values[1], (int)$values[2], (int)$this->dataRecord->ID);
            }
        }

        if (count($items)) {
            $this->RASCI()->exclude(['ID' => $items])->removeAll();
        }

        return $this->renderWith('Includes/TotalsTable');
    }

    /**
     * @param $type
     * @return int
     */
    public function getTotals($type)
    {
        return $this->RASCI()->filter(['Value' => $type])->count();
    }
}
