<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('catalog_items', function (Blueprint $table) {
            $table->string('file_ar')->nullable()->after('description_en');
            $table->string('file_en')->nullable()->after('file_ar');
        });

        Schema::table('catalog_items', function (Blueprint $table) {
            $table->dropColumn('file');
        });
    }

    public function down()
    {
        Schema::table('catalog_items', function (Blueprint $table) {
            $table->string('file')->nullable();
        });

        Schema::table('catalog_items', function (Blueprint $table) {
            $table->dropColumn(['file_ar', 'file_en']);
        });
    }
};
