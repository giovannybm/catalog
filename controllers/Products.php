<?php namespace Lexetam\Catalog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Products Back-end Controller
 */
class Products extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Lexetam.Catalog', 'catalog', 'products');
    }
    public function create()
 {
    //  $this->bodyClass = 'compact-container';
     return $this->asExtension('FormController')->create();
 }
}
