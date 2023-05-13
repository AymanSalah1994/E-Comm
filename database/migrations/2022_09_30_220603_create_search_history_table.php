<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('search_history', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('id_u')->nullable();
            $table->string('search_word')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('search_history');
    }
};
