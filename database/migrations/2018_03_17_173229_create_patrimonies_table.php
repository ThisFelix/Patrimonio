<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('model')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('sector')->nullable();
            $table->string('serialNumber')->nullable();
            $table->string('patrimonyNumber')->nullable();
            $table->integer('status')->default(1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patrimonies');
    }
}
