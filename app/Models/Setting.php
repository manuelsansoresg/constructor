<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefono', 'telefono2', 'correo', 'correo2', 'direccion', 'leyenda_footer',
        'fb', 'instagram', 'twitter', 'youtube', 'tiktok'];


    public static function saveEdit($data)
    {
        $setting = Setting::find(1);
        if ($setting === null) {
            $setting = new Setting($data);
            $setting->save();
        } else {
            $setting->fill($data);
            $setting->update();
        }
        return $setting;
    }

}
