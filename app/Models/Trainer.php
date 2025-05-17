<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name', 'email', 'bio','Phone','specialization','image' ];

    // علاقة مع الدورات التدريبية
    public function gymClasses()
    {
        return $this->hasMany(GymClass::class);  // التأكد من أن اسم الموديل هنا هو GymClass
    }

    // علاقة مع الحجز للدروس الخاصة
    public function privateClassReservations()
    {
        return $this->hasMany(PrivateClassReservation::class);
    }

    // علاقة مع الأعضاء عبر الجدول الوسيط
    public function members()
    {
        return $this->belongsToMany(Member::class, 'classes_members', 'trainer_id', 'member_id');
    }
}
