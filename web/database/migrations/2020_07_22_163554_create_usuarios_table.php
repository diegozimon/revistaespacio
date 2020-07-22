<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("username", 60)->unique();
            $table->string("usermail", 60)->unique();
            $table->string("password");
            $table->string("nombre", 60);
            $table->string("apellido", 60);
            $table->string("direccion");
            $table->timestamps();
        });

        Schema::table("usuarios", function (Blueprint $table){
            $table->foreignId("ciudad_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}