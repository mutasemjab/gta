<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('about_sections', function (Blueprint $table) {
            $table->string('image')->nullable()->after('eyebrow_en');
        });
    }

    public function down()
    {
        Schema::table('about_sections', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
