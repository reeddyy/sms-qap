<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseModulePivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_module', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_5157893')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id', 'module_id_fk_5157893')->references('id')->on('modules')->onDelete('cascade');
        });
    }
}
