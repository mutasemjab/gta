<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow_ar', 150);
            $table->string('eyebrow_en', 150);
            $table->string('title_ar', 250);
            $table->string('title_en', 250);
            $table->text('lead_ar');
            $table->text('lead_en');
            $table->text('paragraph1_ar');
            $table->text('paragraph1_en');
            $table->text('paragraph2_ar');
            $table->text('paragraph2_en');
            $table->string('badge_title', 10)->nullable();
            $table->string('badge_text_ar', 250)->nullable();
            $table->string('badge_text_en', 250)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_sections');
    }
};
