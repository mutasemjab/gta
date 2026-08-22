<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('category_ar', 100);
            $table->string('category_en', 100);
            $table->string('title_ar', 150);
            $table->string('title_en', 150);
            $table->string('location_ar', 200);
            $table->string('location_en', 200);
            $table->enum('size', ['big', 'small'])->default('small');
            $table->string('image')->nullable();
            $table->unsignedInteger('order_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
