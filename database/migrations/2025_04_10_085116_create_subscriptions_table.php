<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void
{
    Schema::create('subscriptions', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->string('title');
        $table->text('description');
        $table->decimal('subscribtion_amount', 8, 2);
        $table->dateTime('date_time');
        $table->text('features')->nullable();  // إضافة عمود الميزات
        $table->string('duration')->nullable();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('subscribtion');
    }
};
