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
            $table->id();
            $table->string('name');
            $table->string('model')->nullable();
            $table->float('price', 8, 2);
            $table->string('description', 20000);
            $table->integer('stock');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('users');
            $table->string('gallery');
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
        Schema::table('products', function (Blueprint $table)
        {
            $table->dropForeign('products_seller_id_foreign');
            $table->dropColumn('seller_id');
            $table->dropForeign('products_category_id_foreign');
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('products');
    }
}
