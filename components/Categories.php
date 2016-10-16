<?php namespace Lexetam\Catalog\Components;

use Db;
use App;
use Request;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Lexetam\Catalog\Models\Category as listCategory;

class Categories extends ComponentBase
{
  /**
   * @var Collection A collection of categories to display
   */
  public $categories;

  /**
   * @var string Reference to the page name for linking to categories.
   */
  public $categoryPage;

  /**
   * @var string Reference to the current category slug.
   */
  public $currentCategorySlug;

  public function componentDetails()
  {
    return [
      'name'        => 'Categories Listing',
      'description' => 'List the catalog categories'
    ];
  }

  public function defineProperties()
  {
    return [
      'slug' => [
        'title'       => 'Slug',
        'description' => '',
        'default'     => '{{ :slug }}',
        'type'        => 'string'
      ],
      'categoryPage' => [
        'title'       => 'Category page',
        'description' => '',
        'type'        => 'dropdown',
        'default'     => ''
      ]
    ];
  }
  public function getCategoryPageOptions()
  {
      return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
  }

  public function onRun()
  {
    $this->currentCategorySlug = $this->page['currentCategorySlug'] = $this->property('slug');
    $this->categoryPage = $this->page['categoryPage'] = $this->property('categoryPage');
    $this->categories = $this->page['categories'] = $this->listCategories();
  }

  protected function listCategories()
  {
    $categories= listCategory::where('is_published',true)->orderBy('category_name');
    $categories = $categories->get();

    return ($this->injectURL($categories));
  }

  protected function injectURL($categories)
  {
      return $categories->each(function($category) {
          $category->setUrl($this->categoryPage, $this->controller);
      });
  }


}
