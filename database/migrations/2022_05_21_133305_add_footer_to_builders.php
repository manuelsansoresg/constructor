<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFooterToBuilders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('builders', function (Blueprint $table) {
            $table->smallInteger('show_footer')->after('is_visible')->nullable();
            $table->smallInteger('show_facebook')->after('show_footer')->nullable();
            $table->smallInteger('show_twitter')->after('show_facebook')->nullable();
            $table->smallInteger('show_instagram')->after('show_twitter')->nullable();
            $table->smallInteger('show_youtube')->after('show_instagram')->nullable();
            $table->string('background_footer')->after('show_youtube')->nullable();
            $table->string('color_footer')->after('background_footer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('builders', function (Blueprint $table) {
            $table->dropcolumn('show_footer');
            $table->dropcolumn('show_facebook');
            $table->dropcolumn('show_instagram');
            $table->dropcolumn('show_twitter');
            $table->dropcolumn('show_youtube');
            $table->dropcolumn('background_footer');
            $table->dropcolumn('color_footer');
        });
    }
}
