<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateClassReservation extends Model
{
    protected $fillable = ['member_id', 'trainer_id', 'sesstion_type', 'reserved_at'];

    // علاقة مع العضو
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // علاقة مع المدرب
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}

