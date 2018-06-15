<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('participant_id')->unsigned();
            $table->integer('instalment_id')->unsigned();
            $table->integer('box_id')->unsigned();
            $table->decimal('value');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('participant_id')
                ->on('participants')
                ->references('id');
            $table->foreign('instalment_id')
                ->on('instalments')
                ->references('id');
            $table->foreign('box_id')
                ->on('boxes')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards');
    }
}
