<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_client',
        'logo_client',
        'project_name',
        'main_pic',
        'article',
        'location',
        'year',
        'designer1',
        'designer2',
        'designer3',
        'designer4',
        'designer5',
        'energy_savings',
        'water_savings',
        'carbon_reduction',
        'pic1',
        'pic2',
        'pic3',
        'pic4',
        'pic5',
        'pic6',
    ];
}
