<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'logo_path',
        'favicon_path',
        'description',
        'email',
        'phone',
        'address',
        'website',
        'social_media',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];
}