<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users'); 
            $table->integer('units');
            $table->string('is_active'); 
            $table->tinyInteger('blood')->nullable();
            $table->tinyInteger('sdp')->nullable();
            $table->tinyInteger('ffp')->nullable();
            $table->tinyInteger('rdp')->nullable();
            $table->tinyInteger('wbc')->nullable();
            $table->string('vehicle_avalability')->nullable();
            $table->integer('can_travel_distance')->nullable();
            $table->string('convt_time_int')->nullable();
            $table->string('ready_emergency')->nullable();
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
        Schema::dropIfExists('donor_history');
    }
}
