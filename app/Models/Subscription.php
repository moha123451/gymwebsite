<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    // إضافة الأعمدة الجديدة إلى fillable
    protected $fillable = ['title', 'description', 'subscribtion_amount', 'features', 'duration', 'date_time'];



public function members()
{
    return $this->hasMany(Member::class);
}

}
