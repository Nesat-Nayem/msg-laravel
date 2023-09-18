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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('websitename', 100)->nullable();
            $table->string('contactdetails', 100)->nullable();
            $table->string('mobilenumber', 20)->nullable();
            $table->string('language', 100)->nullable();
            $table->string('location_radius', 190)->nullable();
            $table->string('commission_percentage', 100)->nullable();
            $table->string('service_locationtype', 20)->nullable();
            $table->string('service_placeholder')->nullable();
            $table->string('profile_placeholder')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('icon')->nullable();
            $table->string('demo_access', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
