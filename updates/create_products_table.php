<?php namespace Lexetam\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsTable extends Migration
{
  public function up()
  {
    Schema::create('lexetam_catalog_products', function(Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('product_name', 300);
      $table->string('slug')->nullable();    
      $table->boolean('is_published')->default(true);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('lexetam_catalog_products');
  }
}
