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
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->string('rdv_id')->unique()->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('num_tel')->nullable();
            $table->string('email')->nullable();
            $table->string('medecin_traitant')->nullable();
            $table->string('select_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rdvs');
    }
};
