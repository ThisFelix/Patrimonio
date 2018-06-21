<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPatrimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patrimonies', function (Blueprint $table) {
            $table->string('serialNumber')->nullable()->after('model');
            $table->string('patrimonyNumber')->nullable()->after('serialNumber');
            $table->integer('status')->default(1)->nullable()->after('id');

        });
    }


    public function down()
    {
        Schema::table('patrimonies', function (Blueprint $table) {
            $table->dropColumn('patrimonyNumber');
            $table->dropColumn('serialNumber');
            $table->dropColumn('status');

        });
    }
}