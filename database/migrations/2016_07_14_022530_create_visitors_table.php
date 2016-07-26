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
            $table->integer('tracker_id')->unsigned()->index();
            $table->integer('prospect_id')->unsigned()->nullable()->index();
            $table->string('guid')->index();
            $table->timestampsTz();
            $table->softDeletes();

            $table->unique(['team_id', 'tracker_id', 'guid']);
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
