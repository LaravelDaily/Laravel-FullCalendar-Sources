<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('venue_id')->nullable();

            $table->foreign('venue_id', 'venue_fk_598776')->references('id')->on('venues');
        });
    }
}
