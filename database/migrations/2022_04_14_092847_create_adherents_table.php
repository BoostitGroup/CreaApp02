<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\VarDumper\Caster\Caster;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Pour la creation de la table adhérent dans la base de donnée adherent_app
    public function up()
    {

        Schema::create('adherents', function (Blueprint $table) {
            $table->id();
            $table->string('nomS');
            $table->string('formeJ');
            $table->string('secteurA');
            $table->string('effectif');
            $table->string('adresse');
            $table->string('wilaya');
            $table->string('nomA');
            $table->string('typeA');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('site');
            //$table->mediumText('logo')->nullable();
            $table->timestamps();

            //$table->unsignedBigInteger('commission_id');
            //$table->foreign('commission_id')->references('id')->on('commissions');
            //$table->foreignId('commission_id')->constrained(); // pour la relation avec la table commission afin de pouvoir afffecter commission a un evenement
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adherents');
    }
}
