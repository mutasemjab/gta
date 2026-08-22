<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_stats', function (Blueprint $table) {
            $table->id();
            $table->string('label_ar', 100);
            $table->string('label_en', 100);
            $table->unsignedInteger('value');
            $table->string('suffix', 10)->nullable();
            $table->unsignedInteger('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_stats');
    }
};
