<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('input_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('rg', 20);
            $table->string('responsible_name', 150);
            $table->timestamps();

            $table->foreign('input_id')->references('id')
            ->on('inputs')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')
            ->on('users')
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
        Schema::dropIfExists('outputs');
    }
}
