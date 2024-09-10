<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_img',
        'title_blog',
        'article_blog',
        'pic1',
        'pic2',
        'pic3',
        'pic4',
    ];
}
