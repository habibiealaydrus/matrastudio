<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'pic_event',
        'title_event',
        'article_event',
        'location_event',
        'date',
        'start_time',
        'end_time',
    ];
}
