<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visitor_id')->unsigned()->index();
            $table->string('action')->index();
            $table->string('resource')->index();
            $table->json('meta')->nullable();
            $table->timestampsTz();
            $table->softDeletes();

            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visitor_events');
    }
}
