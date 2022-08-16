<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Pour la creation de la table evenement dans  la base de donnée adherent_app
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titreE');
            $table->string('categorieE');
            $table->string('description');
            $table->string('dateD');
            $table->string('heureD');
            $table->string('dateF');
            $table->string('heureF');
            $table->string('localisation');
            $table->string('typeE');
            $table->mediumText('logo')->nullable();
            $table->timestamps();

            //$table->unsignedBigInteger('commission_id');
            //$table->foreign('commission_id')->references('id')->on('commissions');
            $table->foreignId('commission_id')->constrained();  // pour la relation avec la table commission afin de pouvoir afffecter commission a un evenement
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenement');
    }
}
