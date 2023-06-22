<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlatformsInVendorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor_details', function (Blueprint $table) {
            $table->string('andoird')->nullable();
            $table->string('ios')->nullable();
            $table->string('list_product')->nullable();
            $table->string('profile_analytics')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor_tables', function (Blueprint $table) {
            //
        });
    }
}
