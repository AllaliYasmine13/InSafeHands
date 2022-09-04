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
        Schema::create('dossier_medicals', function (Blueprint $table) {
            $table->id();
            $table->string('dossier_id')->unique()->nullable();
            $table->string('service')->nullable(); 
            $table->string('photo')->nullable();                    
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('date_naissnace')->nullable();
            $table->string('lieu_naissnace')->nullable();
            $table->string('domicille')->nullable();
            $table->string('profession')->nullable();

            $table->string('medecin_chef')->nullable();           
            $table->string('salle')->nullable();
            $table->string('num_lit')->nullable();
            $table->string('date_entree')->nullable();
            $table->string('mode_entree')->nullable();
            $table->string('date_sortie')->nullable();
            $table->string('mode_sortie')->nullable();

            $table->string('medecin_traitant')->nullable();
            $table->string('diagnostic')->nullable();
            $table->string('traitement')->nullable();
            $table->string('observations')->nullable();
            $table->string('explorations')->nullable();
            $table->string('etat_sortie')->nullable();
            $table->string('indications')->nullable();

            $table->string('signature_chef_service')->nullable();

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
        Schema::dropIfExists('dossier_medicals');
    }
};
