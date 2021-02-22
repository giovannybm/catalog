<?php namespace Lexetam\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('lexetam_catalog_categories', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('category_name',200);
            $table->string('slug')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('lexetam_catalog_categories');
    }
}
