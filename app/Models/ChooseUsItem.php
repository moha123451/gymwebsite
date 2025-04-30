<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseUsItem extends Model
{
    use HasFactory;
    protected $table = 'choose_us_items';

    protected $fillable = ['icon_class', 'title', 'description'];
}

