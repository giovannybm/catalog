<?php namespace Lexetam\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoryProductTable extends Migration
{
    public function up()
    {
        Schema::create('lexetam_catalog_category_product', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('product_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['product_id', 'category_id']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('lexetam_catalog_category_product');
    }
}
