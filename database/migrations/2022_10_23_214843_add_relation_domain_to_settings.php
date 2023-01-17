<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationDomainToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('domain')->nullable()->after('favicon');
        });

        Schema::table('builders', function (Blueprint $table) {
            $table->unsignedBigInteger('setting_id')->nullable()->after('id');
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('domain');
        });
        
        Schema::table('builders', function (Blueprint $table) {
            $table->dropForeign('setting_id');
            $table->dropColumn('setting_id');
        });
    }
}
