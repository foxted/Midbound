<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVisitorEventsTableForTeamScope extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitor_events', function (Blueprint $table) {
            $table->integer('team_id')->nullable()->unsigned()->index();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitor_events', function (Blueprint $table) {
            $table->dropForeign('visitor_events_team_id_foreign');
            $table->dropColumn('team_id');
        });
    }
}
