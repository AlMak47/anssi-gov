<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('partners', function (Blueprint $table) {
        //     $table->string('slug',255)->primary();
        //     $table->string('organisation');
        //     $table->string('logo');
        //     $table->text('description');
        //     $table->timestamps();
        // });
        Schema::table("partners",function (Blueprint $table) {
          $table->enum('tag',['strategique','technique','financier'])->default('strategique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('partners');
    }
}
