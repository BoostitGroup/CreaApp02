<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonsToAdherents extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adherents', function (Blueprint $table) {
            $table->string('DateCreation');
            $table->string('typeAd');
            $table->string('mobile2');
            $table->string('fix1');
            $table->string('fix2');
            $table->string('fax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adherents', function (Blueprint $table) {
            //
        });
    }
}
