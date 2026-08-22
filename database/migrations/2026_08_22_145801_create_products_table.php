<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('chip_label', 30)->nullable();
            $table->string('code', 60)->nullable();
            $table->string('name_ar', 150);
            $table->string('name_en', 150);
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('spec_label_ar', 60)->nullable();
            $table->string('spec_label_en', 60)->nullable();
            $table->string('spec_value', 60)->nullable();
            $table->unsignedInteger('order_index')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
