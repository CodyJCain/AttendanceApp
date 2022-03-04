<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id');
            $table->string('course_id');
            $table->date('class_date');
            $table->string('class_description')->nullable();
            $table->double('latitude_min');
            $table->double('latitude_max');
            $table->double('longitude_min');
            $table->double('longitude_max');
            $table->double('timeStart');
            $table->double('timeEnd');
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
        Schema::dropIfExists('classes');
    }
}
