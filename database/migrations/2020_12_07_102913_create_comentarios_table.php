<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('idnoticia')->unsigned();
            $table->text('text');
            $table->date('date');
            $table->time('time');
            $table->string('email');

            $table->timestamps();
            
            $table->foreign('idnoticia')->references ('id')->on('noticia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario');
    }
}
