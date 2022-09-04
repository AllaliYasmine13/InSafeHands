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
        Schema::create('patients_agees', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->unique()->nullable();
            $table->string('nom_prenom')->nullable();
            $table->string('date')->nullable();
            $table->double('poid')->nullable();
            $table->double('taille')->nullable();
            $table->string('maladie_chronique')->nullable();

            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('medecin_traitant')->nullable();
            $table->string('adressee_par')->nullable();
            $table->string('assurance_maladie')->nullable();

            $table->string('nom_contact_urgence')->nullable();
            $table->string('tel_contact_urgence')->nullable();
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
        Schema::dropIfExists('patients_agees');
    }
};
