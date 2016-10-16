<?php namespace Lexetam\Catalog\Components;

use Db;
use App;
use Request;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Lexetam\Catalog\Models\Product as listProducts;

class Product extends ComponentBase
{
  public $currentProductSlug;

  public $product;

    public function componentDetails()
    {
        return [
            'name'        => 'ComThree Component',
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
          ]
        ];
    }
    public function onRun()
    {
        // $this->categoryPage = $this->page['categoryPage'] = $this->property('categoryPage');
        $this->product = $this->page['product'] = $this->productDetail();
        $this->currentProductSlug =  $this->property('slug');
        $this->page->title=$this->currentProductSlug;
    }
    protected function productDetail()
    {
      $slug = $this->property('slug');
      $productDetail=listProducts::where('slug',$slug)->where('is_published',true)->first();
      return ($productDetail);
    }

}
