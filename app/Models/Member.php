<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Extending Authenticatable
use Illuminate\Notifications\Notifiable;




class Member extends Authenticatable // Extends Authenticatable for authentication
{
    use HasFactory, SoftDeletes, Notifiable;  // Added Notifiable for notifications (optional)

    // Define which fields can be mass-assigned
    protected $fillable = [
        'First_Name', 'Last_name', 'email', 'phone_number', 'date_of_birth',
        'Gender', 'Adress', 'Current_weight', 'Height', 'Bmi', 'Goal_Weight', 'membership_type', 'password'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth' // إذا كان موجوداً
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    public function isTrainer()
{
    return $this->role === 'trainer';
}

    // Enable timestamps (created_at and updated_at)
    public $timestamps = true;

    // Optionally, you can add a custom date format for SoftDeletes
    // protected $dates = ['deleted_at'];
}
