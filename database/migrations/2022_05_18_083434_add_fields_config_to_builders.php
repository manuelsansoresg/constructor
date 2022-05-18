<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsConfigToBuilders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('builders', function (Blueprint $table) {
            $table->string('telefono')->nullable()->after('whatsapp_phone');
            $table->string('telefono2')->nullable()->after('telefono');
            $table->string('correo')->nullable()->after('telefono2');
            $table->string('correo2')->nullable()->after('correo');
            $table->string('direccion')->nullable()->after('correo2');
            $table->text('leyenda_footer')->nullable()->after('direccion');
            $table->string('fb')->nullable()->after('leyenda_footer');
            $table->string('twitter')->nullable()->after('fb');
            $table->string('youtube')->nullable()->after('twitter');
            $table->string('tiktok')->nullable()->after('youtube');
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
            $table->dropcolumn('telefono');
            $table->dropcolumn('telefono2');
            $table->dropcolumn('correo');
            $table->dropcolumn('correo2');
            $table->dropcolumn('direccion');
            $table->dropcolumn('leyenda_footer');
            $table->dropcolumn('fb');
            $table->dropcolumn('twitter');
            $table->dropcolumn('youtube');
            $table->dropcolumn('tiktok');
        });
    }
}
