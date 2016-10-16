<?php namespace Lexetam\Catalog\Models;

use DB;
use App;
use Model;

/**
* Item Model
*/
class Product extends Model
{
use \October\Rain\Database\Traits\Validation;
  /**
  * @var string The database table used by the model.
  */
  public $table = 'lexetam_catalog_products';

  /*
   * Validation
   */
  public $rules = [
      'product_name' => 'required',
      'slug' => 'required|unique:lexetam_catalog_products',
  ];
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
    'categories' => [
      'Lexetam\Catalog\Models\Category',
      'table'=>'lexetam_catalog_category_product'
    ]
  ];
  public $morphTo = [];
  public $morphOne = [];
  public $morphMany = [];
  public $attachOne = [];
  public $attachMany = [
    'product_images' => ['System\Models\File', 'delete' => true],
  ];

//   public function getImageAttribute(){
//     $products = Product::find($this->id);
//     if($products->product_images)
//     {
//       //  foreach ($item->featured_images as $photo) {
//       //   return $photo->getThumb(30, 30, 'crop');
//       //  }
//       $collection = $products->product_images->first(function ($key,$value){
//         return $key=1;
//       }
//     );
//     return '<img src="'. $collection .'" width="80" height="80" alt="Computer Hope">';
//
//   }else
//   {
//     return 'No Image';
//   }
// }

public function setUrl($pageName, $controller)
{
    $params = [
        'id' => $this->id,
        'slug' => $this->slug,
    ];

    return $this->url = $controller->pageUrl($pageName, $params);
}



}
