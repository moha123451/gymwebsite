<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymClass extends Model
{   protected $table = 'gym_classes';
   protected $fillable = [
    'class_name',
    'bio',
    'trainer_id',
    'category',
    'image',
    // الأعمدة الجديدة
    'description',
    'duration',
    'schedule',
    'level',
    'price',
    'max_capacity',
    'is_active'
];
    // علاقة مع المدرب
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    // علاقة مع الأعضاء من خلال الجدول الوسيط
    public function members()
    {
        return $this->belongsToMany(Member::class, 'classes_members', 'class_id', 'member_id');
    }
}

