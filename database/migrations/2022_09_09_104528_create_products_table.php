<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //Creator , owner
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('small_description')->nullable();
            $table->longText('description');
            $table->float('original_price');
            $table->float('selling_price');
            $table->string('product_picture')->default("https://res.cloudinary.com/divmlcuds/image/upload/v1683386389/place_holders/240x320_dal43h.png");
            $table->string('secondary_picture')->default("https://res.cloudinary.com/divmlcuds/image/upload/v1683386389/place_holders/240x320_dal43h.png");
            $table->integer('quantity')->nullable();
            $table->tinyInteger('status')->default('0')->nullable();
            $table->tinyInteger('trending')->default('0')->nullable();
            $table->longText('keywords')->nullable();
            $table->string('youtube_vid')->nullable();
            $table->tinyInteger('refundable')->default('0')->nullable() ;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
