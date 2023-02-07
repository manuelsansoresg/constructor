<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlignTextHighyAndColGalleryToWidgetTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('widget_texts', function (Blueprint $table) {
            $table->string('align')->nullable()->after('content');
            $table->string('height')->nullable()->after('content');
            $table->string('background_color')->nullable()->after('content')->default('#ffffff');
        });

        Schema::table('widget_galleries', function (Blueprint $table) {
            $table->string('size_col_image1')->nullable()->after('linkimagen1');
            $table->string('size_col_image2')->nullable()->after('linkimagen2');
            $table->string('size_col_image3')->nullable()->after('linkimagen3');
            $table->string('size_col_image4')->nullable()->after('linkimagen4');
            $table->string('size_col_image5')->nullable()->after('linkimagen5');
            $table->string('size_col_image6')->nullable()->after('linkimagen6');
            $table->string('size_col_image7')->nullable()->after('linkimagen7');
            $table->string('size_col_image8')->nullable()->after('linkimagen8');
            $table->string('size_col_image9')->nullable()->after('linkimagen9');
            $table->string('size_col_image10')->nullable()->after('linkimagen10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('widget_texts', function (Blueprint $table) {
            $table->dropColumn('align');
            $table->dropColumn('height');
            $table->dropColumn('background_color');
        });
        
        Schema::table('widget_galleries', function (Blueprint $table) {
            $table->dropColumn('size_col_image1');
            $table->dropColumn('size_col_image2');
            $table->dropColumn('size_col_image3');
            $table->dropColumn('size_col_image4');
            $table->dropColumn('size_col_image5');
            $table->dropColumn('size_col_image6');
            $table->dropColumn('size_col_image7');
            $table->dropColumn('size_col_image8');
            $table->dropColumn('size_col_image9');
            $table->dropColumn('size_col_image10');
        });
    }
}
