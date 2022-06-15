<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_topics', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('topic1');
            $table->string('desc1');
            $table->string('status1')->default('NO');
            $table->string('topic2');
            $table->string('desc2');
            $table->string('status2')->default('NO');
            $table->string('topic3');
            $table->string('desc3');
            $table->string('status3')->default('NO');
            $table->string('sp_number');
            $table->date('date_submitted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_topics');
    }
}

