<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsCommisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports_commis', function (Blueprint $table) {
            $table->id();
            $table->integer('rapport_id');
            $table->integer('commission_id');
            $table->foreign('rapport_id')->references('id')->on('rapports');
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
        Schema::dropIfExists('rapports_commis');
    }
}
