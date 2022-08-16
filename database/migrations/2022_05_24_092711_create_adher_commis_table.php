<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherCommisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adher_commis', function (Blueprint $table) {
            $table->id();
            $table->integer('adherent_id');
            $table->integer('commission_id');
            $table->foreign('adherent_id')->references('id')->on('adherents');
            $table->foreign('commission_id')->references('id')->on('commissions');
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
        Schema::dropIfExists('adher_commis');

    }
}
