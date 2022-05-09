<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('wo_do_so');

            $table->string('email')->unique();
            $table->bigInteger('phone')->unique();
            $table->string('profile')->nullable();

            $table->string('dob');
            $table->integer('age')->nullable();

            $table->string('gender');

            $table->string('address')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->integer('pincode');


            $table->string('blood_type')->nullable();

            $table->string('do_av_blood')->nullable();

            $table->string('do_av_sdp')->nullable();
            $table->string('do_av_ffp')->nullable();
            $table->string('do_av_rdp')->nullable();
            $table->string('do_av_wbc')->nullable();

            $table->string('no_times_do')->nullable();
            $table->string('last_do_date')->nullable();
            $table->string('last_do_place')->nullable();
            $table->string('last_do_bloodtype')->nullable();



            $table->string('type_do_blood')->nullable();
            
            $table->string('type_do_sdp')->nullable();
            $table->string('type_do_ffp')->nullable();
            $table->string('type_do_rdp')->nullable();
            $table->string('type_do_wbc')->nullable();

            $table->string('vehicle_car')->nullable();
            $table->string('vehicle_bike')->nullable();


            $table->string('travel_do_blood')->nullable();
            $table->string('convt_time_int')->nullable();
            $table->string('ready_emergency')->nullable();

            $table->string('volunteer_admin')->nullable();
            $table->string('volunteer_pick')->nullable();
            $table->string('volunteer_other')->nullable();


            $table->string('purpose')->nullable();




            $table->string('role')->nullable();
            $table->string('password')->nullable();

            $table->tinyInteger('is_donor_active')->nullable();
            $table->tinyInteger('is_volunteer_active')->nullable();
            $table->timestamp('email_verified_at')->nullable();

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
        Schema::dropIfExists('users');
    }
}
