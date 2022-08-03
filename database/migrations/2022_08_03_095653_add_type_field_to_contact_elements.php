<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeFieldToContactElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_elements', function (Blueprint $table) {
            $table->integer('type_field')->nullable()->default(1)->after('required');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_elements', function (Blueprint $table) {
            $table->dropcolumn('type_field');
        });
    }
}
