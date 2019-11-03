<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('driver_id')->unsigned();
            $table->longText('where_from')->nullable();
            $table->longText('where_to')->nullable();
            $table->dateTime('departure_time')->nullable();
            $table->integer('free_places')->default(0);
            $table->integer('price')->default(0);
            $table->decimal('distance', 20, 20)->nullable();
            $table->decimal('duration', 20, 20)->nullable();
            $table->boolean('no_more_than_two_passengers')->default(0);
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
