<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('cate_product_id')->unsigned()->nullable();
            $table->foreign('cate_product_id')->references('id')->on('cate_products');
            $table->integer('position')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_home')->default(0);
            $table->string('image')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_des')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
