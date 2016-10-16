<?php namespace Lexetam\Catalog\Models;

use Model;
use URL;
use October\Rain\Router\Helper as RouterHelper;
use Cms\Classes\Page as CmsPage;
/**
* Category Model
*/
class Category extends Model
{

  /**
  * @var string The database table used by the model.
  */
  public $table = 'lexetam_catalog_categories';

  /**
  * @var array Guarded fields
  */
  protected $guarded = ['*'];

  /**
  * @var array Fillable fields
  */
  protected $fillable = [];

  /**
  * @var array Relations
  */
  public $hasOne = [];
  public $hasMany = [];
  public $belongsTo = [];
  public $belongsToMany = [
    'products' => ['Lexetam\Catalog\Models\Product',
    'table' => 'lexetam_catalog_category_product'
  ]
];
public $morphTo = [];
public $morphOne = [];
public $morphMany = [];
public $attachOne = [
  'category_image' => ['System\Models\File', 'delete' => false],
];
public $attachMany = [];

public function setUrl($pageName, $controller)
{
    $params = [
        'id' => $this->id,
        'slug' => $this->slug,
    ];

    return $this->url = $controller->pageUrl($pageName, $params);
}

}
