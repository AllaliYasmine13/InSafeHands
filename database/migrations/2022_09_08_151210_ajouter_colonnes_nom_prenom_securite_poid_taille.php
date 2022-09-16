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
        Schema::table('patients_agees', function (Blueprint $table) {
            
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->double('poid')->nullable();
            $table->double('taille')->nullable();
            $table->string('securite_social')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients_agees', function (Blueprint $table) {
            
            $table->dropColumn('nom');
            $table->dropColumn('prenom');
            $table->dropColumn('poid');
            $table->dropColumn('taille');
            $table->dropColumn('securite_social');
        });
    }
};
