<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_elements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('widget_contact_id')->nullable();
            $table->text('name');
            $table->text('placeholder')->nullable();
            $table->smallinteger('required')->nullable();
            $table->foreign('widget_contact_id')->references('id')->on('widget_contacts')->onDelete('cascade');
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
        Schema::dropIfExists('contact_elements');
    }
}
