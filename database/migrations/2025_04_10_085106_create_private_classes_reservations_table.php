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
        Schema::create('private_classes_reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('member_id')->constrained('members');
        $table->foreignId('trainer_id')->constrained('trainers');
        $table->string('sesstion_type');
        $table->dateTime('reserved_at');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_classes_reservations');
    }
};
