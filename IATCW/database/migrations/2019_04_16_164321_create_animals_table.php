<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('animal');
            $table->string('type');
            $table->date('date_of_birth');
            $table->boolean('microchipped')->default(0);
            $table->boolean('vaccinated')->default(0);
            $table->boolean('availability')->default(1);
            $table->longText('description')->nullable();
            $table->string('image', '256')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
