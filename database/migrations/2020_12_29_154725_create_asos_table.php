<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('type', 50);
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('people_id')->unsigned()->nullable();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->bigInteger('conclusion_id')->unsigned()->nullable();
            $table->string('workplace', 150);
            $table->string('post', 150);
            $table->mediumText('physicist')->nullable();
            $table->mediumText('chemical')->nullable();
            $table->mediumText('biological')->nullable();
            $table->mediumText('ergonomic')->nullable();
            $table->mediumText('accident')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('company_id')->references('id')
            ->on('companies')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('people_id')->references('id')
            ->on('people')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('employee_id')->references('id')
            ->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('doctor_id')->references('id')
            ->on('doctors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('conclusion_id')->references('id')
            ->on('conclusions')
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
        Schema::dropIfExists('asos');
    }
}
