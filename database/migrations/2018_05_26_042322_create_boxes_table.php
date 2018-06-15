<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->decimal('value_total');
            $table->date('date_begin')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('months');
            $table->integer('user_id')->unsigned();
            $table->boolean('finish')->default(0);
            $table->boolean('has_instalment')->default(0);
            $table->boolean('method_payment')->default(0);
            $table->date('last_award')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
                ->on('users')
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
        Schema::dropIfExists('boxes');
    }
}
