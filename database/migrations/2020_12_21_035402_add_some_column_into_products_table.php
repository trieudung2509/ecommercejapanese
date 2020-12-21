<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnIntoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable()->after('slug');
            $table->string('origin')->nullable()->after('cate_product_id');
            $table->tinyInteger('vote')->nullable()->after('origin');
            $table->unsignedInteger('price')->nullable()->after('vote');
            $table->unsignedInteger('sale_price')->nullable()->after('price');
            $table->dateTime('sale_start_date')->nullable()->after('sale_price');
            $table->dateTime('sale_end_date')->nullable()->after('sale_start_date');
            $table->unsignedInteger('number')->nullable()->after('sale_end_date')->default(0);
            $table->unsignedInteger('user_create')->nullable()->after('meta_des');
            $table->softDeletes()->after('user_create');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('origin');
            $table->dropColumn('vote');
            $table->dropColumn('price');
            $table->dropColumn('sale_price');
            $table->dropColumn('sale_start_date');
            $table->dropColumn('sale_end_date');
            $table->dropColumn('number');
            $table->dropColumn('user_create');
            $table->dropSoftDeletes();
        });
    }
}
