<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('salary');
            $table->string('currency');
            $table->string('department');
            $table->boolean('on_contract');
            $table->string('sub_department');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_stats');
    }
};
