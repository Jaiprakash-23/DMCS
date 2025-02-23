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

            //
            Schema::table('categories', function (Blueprint $table) {
                $table->renameColumn('sub_category', 'parent_category');
            });

            Schema::table('categories', function (Blueprint $table) {
                $table->after('id', function ($table) {
                    $table->renameColumn('parent_category', 'parent_category'); // Just to move the position
                });
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('parent_category', 'sub_category');
        });
    }
};
