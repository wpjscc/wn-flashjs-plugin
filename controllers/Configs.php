<?php namespace Wpjscc\Flashjs\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Configs extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'wpjscc.flashjs.lists' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Wpjscc.Flashjs', 'flashjs');
    }
}
