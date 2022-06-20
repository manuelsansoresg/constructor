<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'content_product_id', 'title', 'price', 'discount', 'description', 'image'
    ];
}
