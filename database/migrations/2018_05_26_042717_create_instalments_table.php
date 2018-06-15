<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstalmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->decimal('value');
            $table->date('date')->nullable();
            $table->dateTime('date_paid')->nullable();;
            $table->boolean('is_paid')->default(0);
            $table->integer('box_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('instalments');
    }
}
