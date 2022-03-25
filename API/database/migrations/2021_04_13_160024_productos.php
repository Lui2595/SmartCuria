<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('slug');//->unique()
            $table->string('nombre');
            $table->decimal('price');
            $table->string('badge');
            $table->string('availability');
            $table->string('brand');
            $table->timestamps();
        });
        Schema::create('images_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->string('src');
            $table->timestamps();
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
           
        });
        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_user');
            $table->integer('value');
            $table->timestamps();
            $table ->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table ->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
           
           
        });
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_user');
            $table->string('comentario');
            $table->timestamps();
            $table ->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table ->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
           
        });
        

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();

            
        });
        Schema::create('productos_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();
            $table ->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table ->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
           
        });
        Schema::create('promociones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->decimal('precio_promo',10,2);
            $table->timestamps();
            $table ->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            
           
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
