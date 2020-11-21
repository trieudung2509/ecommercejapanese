<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('cate_post_id')->unsigned();
            $table->foreign('cate_post_id')->references('id')->on('cate_posts');
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
        Schema::dropIfExists('posts');
    }
}
