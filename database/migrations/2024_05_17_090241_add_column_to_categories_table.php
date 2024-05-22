<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->after('id');
            $table->unsignedBigInteger('state_id')->after('country_id');
            $table->unsignedBigInteger('district_id')->after('state_id');
            $table->unsignedBigInteger('city_id')->after('district_id')->nullable();
            $table->unsignedBigInteger('location_site_id')->after('city_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
