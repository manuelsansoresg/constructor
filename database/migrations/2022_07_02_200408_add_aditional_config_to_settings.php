<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAditionalConfigToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('image')->after('tiktok')->nullable();
        });
       
        Schema::table('builders', function (Blueprint $table) {
            $table->string('background_menu')->after('color_footer')->nullable()->default('#343a40');
            $table->smallInteger('show_menu')->after('background_menu')->nullable()->default(1);
            $table->smallInteger('show_logo_menu')->after('show_menu')->nullable()->default(1);
            $table->string('text_menu')->after('show_logo_menu')->nullable();
            $table->smallInteger('show_btn_whatsapp')->after('text_menu')->nullable()->default(1);
            $table->string('cel_whatsap')->after('show_btn_whatsapp')->nullable()->default('telefono');
            $table->string('color_text_menu')->after('cel_whatsap')->nullable()->default('#ffffff');
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
            $table->dropcolumn('image');
        });
        
        Schema::table('builders', function (Blueprint $table) {
            $table->dropcolumn('background_menu');
            $table->dropcolumn('show_menu');
            $table->dropcolumn('show_logo_menu');
            $table->dropcolumn('text_menu');
            $table->dropcolumn('show_btn_whatsapp');
            $table->dropcolumn('cel_whatsap');
            $table->dropcolumn('color_text_menu');
        });
    }
}
