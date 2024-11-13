<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskListSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_list_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_list_id'); // Define foreign key column without foreignId
            $table->foreign('task_list_id')->references('id')->on('task_lists')->onDelete('cascade'); // Foreign key constraint
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('task_list_shares');
    }
}
