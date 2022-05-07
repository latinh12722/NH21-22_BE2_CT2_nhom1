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
            $table->increments('product_id');
            $table->string('product_Name',500);
            $table->integer('product_Price');
            $table->unsignedInteger('manu_id');
            $table->unsignedInteger('type_id');
            $table->string('product_image');
            $table->text('product_description');
            $table->integer('product_sale')->default(0);
            $table->tinyInteger('product_feature')->default(0);
            $table->timestamps();

            $table->foreign('manu_id')->references('manu_id')->on('manufactures');
            $table->foreign('type_id')->references('type_id')->on('protypes');
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
