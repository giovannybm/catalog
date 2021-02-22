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
    public function componentDetails()
    {
        return [
            'name'        => 'demo Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

}
