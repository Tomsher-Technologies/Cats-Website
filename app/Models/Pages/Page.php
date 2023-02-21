<?php

namespace App\Models\Pages;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Wildside\Userstamps\Userstamps;

class Page extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'page_name',
        'title',
        'body',
        'slug',
        'featured_image',
        'status',
    ];

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seo');
    }

    public function blocks()
    {
        return $this->hasMany(PageBlock::class);
    }

    public function featuredImage()
    {
        if ($this->featured_image) {
            return URL::to($this->featured_image);
        }
        return asset('frontend/images/international-hero-banner.jpg');
    }
}
