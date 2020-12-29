<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsoExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aso_exam', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exam_id')->unsigned();
            $table->bigInteger('aso_id')->unsigned();
            $table->string('execution_date');
            $table->timestamps();

            $table->foreign('exam_id')->references('id')
            ->on('exams')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('aso_id')->references('id')
            ->on('asos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aso_exam');
    }
}
