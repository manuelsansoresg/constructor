<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'slug', 'color', 'background_image', 'seo_title', 'seo_description',
        'seo_keyword', 'whatsapp_title', 'whatsapp_phone', 'is_visible', 'show_footer',
        'show_facebook', 'show_twitter', 'show_instagram', 'show_youtube'
    ];

    public static function saveEdit($data, $name_page)
    {
        $builder = Builder::where(['name' => $name_page])->first();
        if ($builder !== null) {
            $builder->fill($data);
            $builder->update();
        } else {
            $builder = new Builder($data);
            $builder->save;
        }
    }
}
