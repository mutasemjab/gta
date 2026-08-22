<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('catalog_items', function (Blueprint $table) {
            $table->id();
            $table->string('meta_label_ar', 100)->nullable();
            $table->string('meta_label_en', 100)->nullable();
            $table->string('title_ar', 150);
            $table->string('title_en', 150);
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('file')->nullable();
            $table->unsignedInteger('order_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catalog_items');
    }
};
