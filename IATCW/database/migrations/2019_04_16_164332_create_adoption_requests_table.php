<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userid')->unsigned();
            $table->bigInteger('animalid')->unsigned();
            $table->longText('description')->nullable();
            $table->enum('state', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('animalid')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoption_requests');
    }
}
