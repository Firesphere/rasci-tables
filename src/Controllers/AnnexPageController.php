<?php


namespace Firesphere\ISO27001Compliance\Controllers;


use Firesphere\ISO27001Compliance\Models\RASCI;
use PageController;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\View\Requirements;

class AnnexPageController extends PageController
{

    private static $allowed_actions = [
        'SaveForm'
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

    public function process($data, $form)
    {
        foreach ($data['rasci-value'] as $value) {
            if ($value !== '') {
                $values = explode('-', $value);
                    RASCI::findOrCreate($values[0], $values[1], $values[2], $this->ID);
            }
        }

        return $this->renderWith('Includes/TotalsTable');
    }
}
