<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('student_id');
            $table->string('department');
            $table->string('batch');
            $table->string('semester');
            $table->string('phone');
            $table->string('email');
            $table->string('father');
            $table->string('mother');
            $table->string('address');
            $table->string('guardian');
            $table->integer('status');
            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
