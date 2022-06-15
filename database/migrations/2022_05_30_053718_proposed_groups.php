<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProposedGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_groups', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('student1_id');
            $table->string('student2_id');
            $table->string('student3_id');
            $table->string('sp_number');
            $table->string('status')->default('NOT APPROVED');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
