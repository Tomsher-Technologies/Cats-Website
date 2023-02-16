<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Page extends Model
{
    use HasFactory, Userstamps;

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seo');
    }
}
