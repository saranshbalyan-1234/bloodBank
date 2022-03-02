<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')
            ->references('id')->on('users'); 
            $table->integer('total_units_donated')->default(0);
            $table->string('is_active')->default(1); 
            $table->tinyInteger('blood')->nullable();
            $table->tinyInteger('sdp')->nullable();
            $table->tinyInteger('ffp')->nullable();
            $table->tinyInteger('rdp')->nullable();
            $table->tinyInteger('wbc')->nullable();
            $table->tinyInteger('vehicle')->nullable();
            $table->integer('can_travel_distance')->nullable();
            $table->string('convt_time')->nullable();
            $table->tinyInteger('ready_emergency')->nullable();
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
        Schema::dropIfExists('donors');
    }
}
