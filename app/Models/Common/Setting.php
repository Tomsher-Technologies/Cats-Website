<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Setting extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'name',
        'value',
        'label',
        'type',
        'group'
    ];
}
