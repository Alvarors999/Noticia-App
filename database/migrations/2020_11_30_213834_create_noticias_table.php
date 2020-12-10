<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
           $table->id();
            
            $table->string('title', 60);
            $table->text('text');
            $table->longtext('image')->nullable();
            $table->string('author', 50);
            $table->date('date');

            $table->timestamps();
            
            $table->unique(['title', 'author']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}