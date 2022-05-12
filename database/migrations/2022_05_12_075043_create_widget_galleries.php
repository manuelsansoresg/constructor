<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->string('image');
            $table->text('text')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widget_galleries');
    }
}
