<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Schema::create('pages',function (Blueprint $table) {
        //     $table->string('slug');
        //     $table->primary('slug');
        //     $table->text('contenu');
        //     $table->string('titre');
        //     $table->enum('tag',['presentation','voir_aussi']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // Schema::dropIfExists('pages');
    }
}
