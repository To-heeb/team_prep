<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 150);
            $table->string('lastname', 150);
            $table->string('middlename', 150)->nullable();
            $table->string('email', 70)->nullable();
            $table->integer('age');
            $table->string('sponsor', 255)->nullable();
            $table->string('next_of_kin', 255)->nullable();
            $table->string('residential_state', 150);
            $table->string('residential_lga', 150);
            $table->date('appointment_date');
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
        Schema::dropIfExists('applicants');
    }
};
