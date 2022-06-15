<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_topics', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('student1_id');
            $table->string('student2_id');
            $table->string('student3_id');
            $table->string('topic');
            $table->string('sp_number');
            $table->date('date_submitted');
            $table->date('date_approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approved_topics');
    }
}
