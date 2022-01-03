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
            $table->integer('age');
            $table->string('gender');
            $table->integer('phone');
            $table->string('blood_type');
            $table->string('type_rh');
            $table->integer('unit');
            $table->foreignId('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users'); 
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
