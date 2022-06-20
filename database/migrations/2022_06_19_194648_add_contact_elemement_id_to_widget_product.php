<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactElemementIdToWidgetProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('widget_products', function (Blueprint $table) {
            $table->unsignedBigInteger('content_product_id')->nullable()->after('id');
            $table->foreign('content_product_id')->references('id')->on('content_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('widget_products', function (Blueprint $table) {
            $table->dropcolumn('content_product_id');
        });
    }
}
