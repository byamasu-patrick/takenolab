<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->unique();
            $table->string('course_image');            
            $table->string('course_heading');
            $table->text('course_overview');
            $table->text('title_catching_area_one');
            $table->longText('course_catching_area_one');
            $table->text('title_catching_area_two');
            $table->longText('course_catching_area_two');
            $table->text('title_catching_area_three');
            $table->longText('course_catching_area_three');
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
        Schema::dropIfExists('courses');
    }
}
