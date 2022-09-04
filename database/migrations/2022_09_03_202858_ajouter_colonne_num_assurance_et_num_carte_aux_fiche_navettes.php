<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiche_navettes', function (Blueprint $table) {
            $table->string('num_assurance')->unique()->nullable();
            $table->string('num_carte')->unique()->nullable(); 
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fiche_navettes', function (Blueprint $table) {
            $table->string('num_assurance')->unique()->nullable();
            $table->string('num_carte')->unique()->nullable(); 
        });
    }
};
