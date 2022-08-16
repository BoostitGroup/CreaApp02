<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('titreR');
            $table->string('PDF');
            $table->string('description');
            $table->string('datePub');
            $table->string('categorieR');
            $table->mediumText('image')->nullable();

            //$table->unsignedBigInteger('commission_id');
            //$table->foreign('commission_id')->references('id')->on('commissions');
            $table->foreignId('commission_id')->constrained();  // pour la relation avec la table commission afin de pouvoir afffecter commission a un evenement
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
        Schema::dropIfExists('rapports');
    }
}
