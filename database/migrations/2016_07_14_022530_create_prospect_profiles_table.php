<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospect_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prospect_id')->unsigned();
            $table->json('emails')->nullable();
            $table->json('names')->nullable();
            $table->json('phones')->nullable();
            $table->json('customs')->nullable();
            $table->timestampsTz();

            $table->foreign('prospect_id')->references('id')->on('prospects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prospect_profiles');
    }
}
