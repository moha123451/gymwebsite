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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('First_Name');
            $table->string('Last_name');
            $table->string('email')->unique()->nullable();  // Make sure this field can be NULL
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Adress')->nullable();
            $table->decimal('Current_weight', 8, 2)->nullable();
            $table->decimal('Height', 8, 2)->nullable();
            $table->decimal('Bmi', 8, 2)->nullable();
            $table->decimal('Goal_Weight', 8, 2)->nullable();
            $table->string('membership_type')->nullable();
            $table->timestamps();
            $table->string('role')->default('member'); // member, admin, trainer
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
