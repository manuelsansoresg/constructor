<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuilder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('color')->nullable();
            $table->string('background_image')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('whatsapp_title')->nullable();
            $table->string('whatsapp_phone')->nullable();
            $table->smallinteger('is_visible')->nullable();
            $table->timestamps();
        });

        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('execute_widget')->nullable();
            $table->timestamps();
        });

        Schema::create('widget_headers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->string('image')->nullable();
            $table->text('title');
            $table->text('phone')->nullable();
            $table->text('phone2')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('widget_carusel', function (Blueprint $table) {
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

       /*  Schema::create('widget_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->string('image');
            $table->text('text')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        }); */
       
        Schema::create('widget_texts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->text('content');
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('widget_two_columns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('footer')->nullable();
            $table->text('image')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('widget_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->text('title');
            $table->text('price')->nullable();
            $table->text('discount')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('widget_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('video')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });
       
        Schema::create('widget_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_id')->nullable();
            
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('comment')->nullable();
            $table->smallinteger('is_template')->default(0)->nullable();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('widget_builders', function (Blueprint $table) {
            $table->unsignedBigInteger('builder_id')->nullable();
            $table->integer('id_rel')->nullable();
            $table->unsignedBigInteger('widget_id')->nullable();
            $table->foreign('builder_id')->references('id')->on('builders')->onDelete('cascade');
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
        Schema::dropIfExists('builder');
        Schema::dropIfExists('widgets');
        Schema::dropIfExists('widget_headers');
        Schema::dropIfExists('widget_galleries');
        Schema::dropIfExists('widget_texts');
        Schema::dropIfExists('widget_two_columns');
        Schema::dropIfExists('widget_products');
        Schema::dropIfExists('widget_videos');
        Schema::dropIfExists('widget_contacts');
        Schema::dropIfExists('widget_builders');
    }
}
