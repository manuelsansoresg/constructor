<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Builder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'color', 'background_image', 'seo_title', 'seo_description',
        'seo_keyword', 'whatsapp_title', 'whatsapp_phone', 'is_visible', 'show_footer',
        'show_facebook', 'show_twitter', 'show_instagram', 'show_youtube', 'background_footer', 'color_footer',
        'background_menu', 'show_menu', 'show_logo_menu', 'text_menu',
        'show_btn_whatsapp', 'cel_whatsap', 'color_text_menu', 'setting_id'
    ];

    public static function saveEdit($data, $name_page)
    {
        if ($data['background_footer'] == null) {
            $data['background_footer'] = "#000000";
        }

        if ($data['color_footer'] == null) {
            $data['color_footer'] = "#000000";
        }

        if ($data['color'] == null) {
            $data['color'] = "#000000";
        }

        if (!isset($data['show_menu'])) {
            $data['show_menu'] = 0;
        }

        if (!isset($data['show_logo_menu'])) {
            $data['show_logo_menu'] = 0;
        }

        if (!isset($data['show_footer'])) {
            $data['show_footer'] = 0;
        }
        if (!isset($data['show_facebook'])) {
            $data['show_facebook'] = 0;
        }
        if (!isset($data['show_twitter'])) {
            $data['show_twitter'] = 0;
        }
        if (!isset($data['show_instagram'])) {
            $data['show_instagram'] = 0;
        }
        if (!isset($data['show_youtube'])) {
            $data['show_youtube'] = 0;
        }
        if (!isset($data['show_btn_whatsapp'])) {
            $data['show_btn_whatsapp'] = 0;
        }

        $setting = Setting::get();
        $builder = Builder::where(['name' => $name_page, 'setting_id' => $setting->id])->first();
        if ($builder !== null) {
            if ($name_page != 'Inicio') {
                $data['slug'] = Str::slug($data['name']);
            }
            $builder->fill($data);
            $builder->update();
        } else {
            $builder = new Builder($data);
            $builder->save;
        }
        return $builder;
    }

    public function getByPageName($name)
    {
        return Builder::where('name', $name)->first();
    }

    public static function getAll()
    {
        $setting = Setting::get();
        return Builder::where('setting_id', $setting->id)->get();
    }
}
