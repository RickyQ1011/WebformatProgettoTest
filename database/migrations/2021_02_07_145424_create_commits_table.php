<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('commit_type_id');
            $table->unsignedBigInteger('employee_task_id');
            $table->timestamps();
            $table->string("commit_name");
            $table->string("description");

            $table->foreign('commit_type_id')
                ->references('id')->on('commits_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('employee_task_id')
                ->references('id')->on('employee_task')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commits');
    }
}
