<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_pic',
        'headline_news',
        'article_news',
        'logo_news',
        'link_berita',
    ];
}
