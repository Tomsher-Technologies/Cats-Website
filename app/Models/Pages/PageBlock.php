<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'heading',
        'content',
        'has_videos',
        'videos',
        'has_image',
        'image',
        'image_alt',
        'has_button',
        'button_text',
        'button_link',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
