<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Marcas extends Migration{
    
    public function up(){
        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->string("name",60);
            $table->string("slug",60);
            $table->string("image",255);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('marcas');
    }
}