<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gym_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->text('bio')->nullable();
            $table->foreignId('trainer_id')->constrained('trainers')->onDelete('cascade');
            $table->string('category');
            $table->string('image')->nullable(); // لتخزين اسم الصورة
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gym_classes');
    }

};
