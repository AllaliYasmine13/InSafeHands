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
        Schema::create('certificat_medicals', function (Blueprint $table) {
            $table->id();
            $table->string('certificat_id')->unique()->nullable();
            $table->string('soussigne')->nullable();
            $table->string('date_certificat')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('Age')->nullable();
            $table->string('Presente')->nullable();
            $table->string('commentaire')->nullable();
            $table->string('signe_par')->nullable();
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
        Schema::dropIfExists('certificat_medicals');
    }
};
