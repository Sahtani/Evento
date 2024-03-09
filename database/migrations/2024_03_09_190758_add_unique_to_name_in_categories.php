<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unique('name', 'unique_name_in_categories');
        });
    /**
     * Reverse the migrations.
     */
    Schema::table('categories', function (Blueprint $table) {
        $table->dropUnique('unique_name_in_categories');
    });
    }
};
