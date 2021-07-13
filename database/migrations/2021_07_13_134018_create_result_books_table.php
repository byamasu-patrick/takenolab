<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_books', function (Blueprint $table) {
            $table->id();
            $table->integer("course_id");
            $table->integer("topic_id");
            $table->integer("student_id");
            $table->integer("question_id");    
            $table->double("marks");           
            $table->text("selected_answer");
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
        Schema::dropIfExists('result_books');
    }
}
