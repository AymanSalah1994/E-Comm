<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('status')->default('0');
            /*
            0 -> Unckecked , 1 -> Checked
            2 -> InPreparation , 3 -> Cancelled
            4 -> Done  , 5 -> ReFunded
            */
            $table->string('tracking_id', 7);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
