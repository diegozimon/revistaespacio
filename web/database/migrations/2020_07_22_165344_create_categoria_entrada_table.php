<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_entrada', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('categoria_entrada', function (Blueprint $table) {
            $table->foreignId("entrada_id")->constrained();
            $table->foreignId("categoria_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_entrada');
    }
}