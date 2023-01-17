<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToWidgetGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('widget_galleries', function (Blueprint $table) {
            $table->string('linkimagen1')->after('imagen1')->nullable();
            $table->string('linkimagen2')->after('imagen2')->nullable();
            $table->string('linkimagen3')->after('imagen3')->nullable();
            $table->string('linkimagen4')->after('imagen4')->nullable();
            $table->string('linkimagen5')->after('imagen5')->nullable();
            $table->string('linkimagen6')->after('imagen6')->nullable();
            $table->string('linkimagen7')->after('imagen7')->nullable();
            $table->string('linkimagen8')->after('imagen8')->nullable();
            $table->string('linkimagen9')->after('imagen9')->nullable();
            $table->string('linkimagen10')->after('imagen10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('widget_galleries', function (Blueprint $table) {
            $table->dropColumn('linkimagen1');
            $table->dropColumn('linkimagen2');
            $table->dropColumn('linkimagen3');
            $table->dropColumn('linkimagen4');
            $table->dropColumn('linkimagen5');
            $table->dropColumn('linkimagen6');
            $table->dropColumn('linkimagen7');
            $table->dropColumn('linkimagen8');
            $table->dropColumn('linkimagen9');
            $table->dropColumn('linkimagen10');
        });
    }
}
