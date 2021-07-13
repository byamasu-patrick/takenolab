<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalCourseMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_course_materials', function (Blueprint $table) {
            $table->id();
            $table->integer("course_id");
            $table->integer("topic_id");
            $table->longText("week_description");
            $table->text("course_lecture");
            $table->text("powerpoint_presentation")->default("none");
            $table->text("reference_link_one")->default("none");
            $table->text("reference_link_two")->default("none");
            $table->text("reference_link_three")->default("none");
            $table->text("reference_link_four")->default("none");
            $table->text("other_reference")->default("none");
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
        Schema::dropIfExists('additional_course_materials');
    }
}
