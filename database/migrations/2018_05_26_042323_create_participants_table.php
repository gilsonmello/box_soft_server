<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 13)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('cell_phone', 15)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('number', 50)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
                ->on('users')
                ->references('id');
        });

        Schema::create('boxes_has_participants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('box_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->foreign('box_id')
                ->on('boxes')
                ->references('id');
            $table->foreign('participant_id')
                ->on('participants')
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
        Schema::dropIfExists('boxes_has_participants');
        Schema::dropIfExists('participants');
    }
}
