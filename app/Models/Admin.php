<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    // إذا كان هناك علاقة مع أعضاء أو مدربين (مثال)
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function trainers()
    {
        return $this->hasMany(Trainer::class);
    }
}
