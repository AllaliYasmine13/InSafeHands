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
        Schema::create('fiche_navettes', function (Blueprint $table) {
            $table->id();
            $table->string('admission_id')->nullable();
            $table->string('service')->nullable();                     
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('age')->nullable();
            $table->string('securite_social')->nullable();
            
            $table->string('actes_medicaux_chirurgicaux')->nullable();
            $table->string('bilan_biologiques_radiologique')->nullable();

            $table->string('date_entree')->nullable();
            $table->string('heure_entree')->nullable();
            $table->string('salle')->nullable();
            $table->string('num_lit')->nullable();
            $table->string('mode_entree')->nullable();
            $table->string('medicaments')->nullable();

            $table->string('date_sortie')->nullable();
            $table->string('heure_sortie')->nullable();
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
        Schema::dropIfExists('fiche_navettes');
    }
};
