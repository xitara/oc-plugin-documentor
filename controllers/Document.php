<?php namespace Xitara\Documentation\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Document Back-end Controller
 */
class Document extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Xitara.Documentation', 'documentation', 'document');
    }

    public function create($namespace = null)
    {
        $this->vars['namespace'] = $namespace;
        $this->asExtension('FormController')->create();
    }
}
