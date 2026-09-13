<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('section_headings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('eyebrow_ar', 150)->nullable();
            $table->string('eyebrow_en', 150)->nullable();
            $table->string('title_ar', 250)->nullable();
            $table->string('title_en', 250)->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_headings');
    }
};
