<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materiales extends Migration{
    
    public function up(){
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('materiales');
    }
}