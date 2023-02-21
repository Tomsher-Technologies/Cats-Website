<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Seo extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'seo_id',
        'seo_type',
        'title',
        'og_title',
        'twitter_title',
        'description',
        'og_description',
        'twitter_description',
        'keywords',
    ];

    public function seo()
    {
        return $this->morphTo();
    }
}
