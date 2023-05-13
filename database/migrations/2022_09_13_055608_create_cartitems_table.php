<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default('1');
            $table->tinyInteger('status')->default('0');
            /*
            0 -> Unckecked
            1 -> Checked
            2 -> InPreparation
            3 -> Cancelled
            4 -> Done
            5 -> ReFunded
            */
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartitems');
    }
};
