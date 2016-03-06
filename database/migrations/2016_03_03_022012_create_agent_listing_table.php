<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_listing', function (Blueprint $table) {
            $table->integer('agent_id')->unsigned()->index();
            // Allows for proper clean-up of elements deleted in the other tables.
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            
            $table->integer('listing_id')->unsigned()->index();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
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
        Schema::drop('agent_listing');
    }
}
