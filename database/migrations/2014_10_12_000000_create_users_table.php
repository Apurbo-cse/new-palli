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

            $table->string('last_name')->nullable();

            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('user_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();

            $table->string('description')->nullable();
            $table->string('image')->nullable();

            $table->string('course_name')->nullable();
            $table->string('course_subject')->nullable();
            $table->string('course_status')->nullable();

            $table->string('job_type')->nullable();
            $table->string('job_designation')->nullable();
            $table->string('job_work')->nullable();

            $table->string('hsc_group')->nullable();
            $table->string('hsc_institute')->nullable();
            $table->string('hsc_status')->nullable();
            $table->string('hsc_passing_year')->nullable();

            $table->string('diploma_subject')->nullable();
            $table->string('diploma_institute')->nullable();
            $table->string('diploma_status')->nullable();
            $table->string('diploma_passing_year')->nullable();

            $table->string('bsc_subject')->nullable();
            $table->string('bsc_institute')->nullable();
            $table->string('bsc_status')->nullable();
            $table->string('bsc_passing_year')->nullable();

            $table->string('msc_subject')->nullable();
            $table->string('msc_institute')->nullable();
            $table->string('msc_status')->nullable();
            $table->string('msc_passing_year')->nullable();

            $table->string('mba_subject')->nullable();
            $table->string('mba_institute')->nullable();
            $table->string('mba_status')->nullable();
            $table->string('mba_passing_year')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();

            $table->string('present_add')->nullable();
            $table->string('permanent_add')->nullable();


            $table->string('district')->nullable();
            $table->string('thana')->nullable();

            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood')->nullable();

            $table->rememberToken();
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
