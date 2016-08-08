<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned()->index();
            $table->integer('website_id')->unsigned()->nullable()->index();
            $table->integer('prospect_id')->unsigned()->nullable()->index();
            $table->string('guid')->index();
            $table->timestampsTz();
            $table->softDeletes();

            $table->unique(['team_id', 'website_id', 'guid']);
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('website_id')->references('id')->on('websites')->onDelete('set null');
            $table->foreign('prospect_id')->references('id')->on('prospects')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visitors');
    }
}
