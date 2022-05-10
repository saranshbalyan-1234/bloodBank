<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('age');
            $table->string('gender');
            $table->bigInteger('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('district');
            $table->string('hospital_name');
            $table->bigInteger('hospital_phone');
            $table->string('hospital_state');
            $table->string('hospital_city');
            $table->string('hospital_district');
            $table->string('blood_type');
            $table->string('fname')->nullable();
            $table->string('path')->nullable();
            // $table->string('type_rh');
            $table->integer('unit');
            $table->string('date_required');
            $table->foreignId('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade'); 
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
        Schema::dropIfExists('request_donors');
    }
}
