<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassesMember extends Pivot
{
    protected $table = 'classes_members';

    // إذا كان هناك أعمدة إضافية في الجدول، يمكنك إضافتها هنا
    protected $fillable = ['trainer_id', 'members_id'];
}
