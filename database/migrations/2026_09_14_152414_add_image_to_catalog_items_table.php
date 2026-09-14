<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('catalog_items', function (Blueprint $table) {
            $table->string('image')->nullable()->after('meta_label_en');
        });
    }

    public function down()
    {
        Schema::table('catalog_items', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
