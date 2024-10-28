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
        'grid_pic',
        'article',
        'location',
        'year',
        'status',
        'energy_savings',
        'water_savings',
        'carbon_reduction',
        'embodied_energy',
        'basic_design',
        'main_contractor',
        'architecht_build',
        'architecht',
        'sustainability_team',
        'team_arsitektur',
        'struktur',
        'mep',
        'qs',
        'design_team',
        'collaborators',
        'fabrication_team',
        'publication',
        'pic1',
        'name_pic1',
        'pic2',
        'name_pic2',
        'pic3',
        'name_pic3',
        'pic4',
        'name_pic4',
        'pic5',
        'name_pic5',
        'pic6',
        'name_pic6',
        'pic7',
        'name_pic7',
    ];
}
