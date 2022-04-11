<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'color', 'background_image', 'seo_title', 'seo_description',
        'seo_keyword', 'whatsapp_title', 'whatsapp_phone', 'is_visible'
    ];
}
