<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['member_id', 'amount', 'payment_method'];

    // علاقة مع العضو
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}

