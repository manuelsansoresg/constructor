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
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
            $table->string('imagen3')->nullable();
            $table->string('imagen4')->nullable();
            $table->string('imagen5')->nullable();
            $table->string('imagen6')->nullable();
            $table->string('imagen7')->nullable();
            $table->string('imagen8')->nullable();
            $table->string('imagen9')->nullable();
            $table->string('imagen10')->nullable();
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
