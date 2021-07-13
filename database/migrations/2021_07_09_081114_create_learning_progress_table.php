<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_progress', function (Blueprint $table) {
            $table->id();
            $table->integer("student_id");
            $table->integer("course_id");
            $table->integer("week_id");
            $table->integer("video_played");
            $table->integer("week_progress");
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
        Schema::dropIfExists('learning_progress');
    }
}
