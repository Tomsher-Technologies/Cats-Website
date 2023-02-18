<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Wildside\Userstamps\Userstamps;

class Team extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'name',
        'designation',
        'status',
        'image',
        'image_alt',
        'sort_order',
    ];

    public function featuredImage()
    {
        if ($this->image) {
            return URL::to($this->image);
        }
        return asset('frontend/images/international-hero-banner.jpg');
    }
}
