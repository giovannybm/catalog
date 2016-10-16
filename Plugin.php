<?php namespace Lexetam\Catalog;

use Backend;
use System\Classes\PluginBase;

/**
* Catalog Plugin Information File
*/
class Plugin extends PluginBase
{

  /**
  * Returns information about this plugin.
  *
  * @return array
  */
  public function pluginDetails()
  {
    return [
      'name'        => 'Catalog',
      'description' => 'Simple product list',
      'author'      => 'Lexetam',
      'icon'        => 'icon-th'
    ];
  }

  /**
  * Register method, called when the plugin is first registered.
  *
  * @return void
  */
  public function register()
  {

  }

  /**
  * Boot method, called right before the request route.
  *
  * @return array
  */
  public function boot()
  {

  }

  /**
  * Registers any front-end components implemented in this plugin.
  *
  * @return array
  */
  public function registerComponents()
  {
    // return []; // Remove this line to activate

    return [
      'Lexetam\Catalog\Components\Categories' => 'catalogCategories',
      'Lexetam\Catalog\Components\Products' => 'catalogProducts',
      'Lexetam\Catalog\Components\Product' => 'catalogProduct',
    ];
  }

  /**
  * Registers any back-end permissions used by this plugin.
  *
  * @return array
  */
  public function registerPermissions()
  {
    return []; // Remove this line to activate

    return [
      'lexetam.catalog.some_permission' => [
        'tab' => 'Catalog',
        'label' => 'Some permission'
      ],
    ];
  }

  /**
  * Registers back-end navigation items for this plugin.
  *
  * @return array
  */
  public function registerNavigation()
  {
    // return []; // Remove this line to activate

    return [
      'catalog' => [
        'label'       => 'Catalog',
        'url'         => Backend::url('lexetam/catalog/products'),
        'icon'        => 'icon-th',
        'permissions' => ['lexetam.catalog.*'],
        'order'       => 20,

        'sideMenu' => [
            'products' => [
                'label' => 'Items',
                'icon' => 'icon-th-list',
                'url' => Backend::url('lexetam/catalog/products'),
            ],
        'categories' => [
                'label' => 'Categories',
                'icon' => 'icon-folder',
                'url' => Backend::url('lexetam/catalog/categories'),
            ]

        ]
      ],
    ];
  }

}
