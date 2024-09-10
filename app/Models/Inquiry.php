<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillabel = [
        'title_gender',
        'first_name',
        'last_name',
        'email_inquiry',
        'phone',
        'post_code',
        'company_name',
        'company_location',
        'type_project',
        'subject_inquiry',
        'message_inquiry',
        'project_file',
    ];
}
