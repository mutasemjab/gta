<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('navbar_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('brand_name_ar', 150);
            $table->string('brand_name_en', 150);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navbar_settings');
    }
};
