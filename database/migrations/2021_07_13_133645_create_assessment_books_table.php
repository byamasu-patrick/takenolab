<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_books', function (Blueprint $table) {
            $table->id();
            $table->integer("course_id");
            $table->integer("topic_id");
            $table->integer("teacher_id");
            $table->text("question");            
            $table->text("first_answer");
            $table->text("second_answer");
            $table->text("third_answer");
            $table->text("fourth_answer");
            $table->text("correct_answer");
            $table->integer("approved_state")->default(0);            
            $table->text("published_state")->default(0);
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
        Schema::dropIfExists('assessment_books');
    }
}
