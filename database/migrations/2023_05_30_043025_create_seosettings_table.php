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
        Schema::create('seosettings', function (Blueprint $table) {
            $table->id();
            $table->string('metatitle', 100)->nullable();
            $table->string('metakeyword', 160)->nullable();
            $table->string('metadescription', 160)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seosettings');
    }
};
