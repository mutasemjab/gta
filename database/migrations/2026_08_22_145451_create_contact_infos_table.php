<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 50);
            $table->string('email', 150);
            $table->string('address_ar', 250);
            $table->string('address_en', 250);
            $table->string('hours_ar', 150);
            $table->string('hours_en', 150);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_infos');
    }
};
