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
    Schema::table('trainers', function (Blueprint $table) {
        $table->string('image')->nullable(); // يمكنك جعله nullable إذا الصورة اختيارية
    });
}

public function down(): void
{
    Schema::table('trainers', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}

};
