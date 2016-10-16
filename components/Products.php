<?php namespace Lexetam\Catalog\Components;

use Db;
use App;
use Request;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Lexetam\Catalog\Models\Product as listProducts;
use Lexetam\Catalog\Models\Category as listCategory;

class Products extends ComponentBase
{
  /**
  * @var Collection A collection of categories to display
  */
  public $products;

  /**
  * @var string Reference to the page name for linking to categories.
  */
  public $productPage;

  /**
  * @var string Reference to the current category slug.
  */
  public $currentProductSlug;

  public function componentDetails()
  {
    return [
      'name'        => 'Products Component',
      'description' => 'No description provided yet...'
    ];
  }

  public function defineProperties()
  {
    return [
      'slug' => [
        'title'       => 'Category Slug',
        'description' => '',
        'default'     => '{{ :slug }}',
        'type'        => 'string'
      ],
      'productPage' => [
        'title'       => 'Product page',
        'description' => '',
        'type'        => 'dropdown',
        'default'     => ''
      ]
    ];
  }

  public function getProductPageOptions()
  {
    return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
  }

  public function onRun()
  {
    $this->productPage = $this->page['productPage'] = $this->property('productPage');
    $this->currentProductSlug = $this->page['currentProductSlug'] = $this->property('slug');
    $this->products = $this->page['products'] = $this->listProducts();

    $this->page->title=$this->currentProductSlug;
  }

  protected function listProducts()
  { $slug = $this->property('slug');
    $catid =listCategory::where('slug',$slug)->pluck('id');
    if (!$catid){
       $this->setStatusCode(404);
       return $this->controller->run('404');
    }


    $list = listCategory::find($catid)->products()->where('is_published',true)->orderBy('product_name')->get();
    return $this->injectURL($list);
  }

  protected function injectURL($categories)
  {
    return $categories->each(function($category) {
      $category->setUrl($this->productPage, $this->controller);
    });
  }
}
