<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow_ar', 150);
            $table->string('eyebrow_en', 150);
            $table->string('heading_line1_ar', 150);
            $table->string('heading_line1_en', 150);
            $table->string('heading_highlight_ar', 150);
            $table->string('heading_highlight_en', 150);
            $table->string('heading_line2_ar', 150);
            $table->string('heading_line2_en', 150);
            $table->text('lead_ar');
            $table->text('lead_en');
            $table->string('primary_btn_link')->default('#products');
            $table->string('secondary_btn_link')->default('#catalog');
            $table->string('strip_text')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heroes');
    }
};
