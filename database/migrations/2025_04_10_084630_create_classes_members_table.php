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
        Schema::create('classes_members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        $table->foreignId('trainer_id')->constrained('trainers');
        $table->foreignId('members_id')->constrained('members');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_members');
    }
};
