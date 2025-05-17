<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('gym_classes', function (Blueprint $table) {
            // الأعمدة الأساسية
            $table->text('description')->after('bio')->nullable();
            $table->string('duration', 50)->after('description')->nullable();
            $table->string('schedule')->after('duration')->nullable();
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->after('schedule')->default('beginner');
            $table->decimal('price', 8, 2)->after('level')->nullable();
            $table->integer('max_capacity')->after('price')->nullable();
            $table->boolean('is_active')->after('max_capacity')->default(true);

            // يمكنك إضافة المزيد من الأعمدة هنا
        });
    }

    public function down()
    {
        Schema::table('gym_classes', function (Blueprint $table) {
            // للتراجع عن التغييرات
            $table->dropColumn([
                'description',
                'duration',
                'schedule',
                'level',
                'price',
                'max_capacity',
                'is_active'
            ]);
        });
    }
};
