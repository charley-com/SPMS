<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('first_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('project_code')->nullable();
            $table->string('project_title')->nullable();
            $table->string('sp_number')->nullable();
            $table->string('first_choice')->nullable();
            $table->string('second_choice')->nullable();
            $table->string('third_choice')->nullable();
            $table->string('approved_topic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
