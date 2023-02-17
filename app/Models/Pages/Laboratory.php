<?php

namespace App\Models\Pages;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Wildside\Userstamps\Userstamps;

class Laboratory extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'name',
        'content',
        'videos',
        'status',
        'image',
        'image_alt',
        'main_video',
        'sort_order',
        'slug',
    ];

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seo');
    }

    public function featuredImage()
    {
        if ($this->image) {
            return URL::to($this->image);
        }
        return asset('frontend/images/international-hero-banner.jpg');
    }
}
