<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['member_id', 'rating', 'comment'];

    // علاقة مع العضو
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
