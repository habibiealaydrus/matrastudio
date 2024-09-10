<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectclient extends Model
{
    use HasFactory;
    protected $fillable = [
        'projectclient_name',
        'projectclient_img',
    ];
}
