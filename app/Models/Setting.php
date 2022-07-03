<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefono', 'telefono2', 'correo', 'correo2', 'direccion', 'leyenda_footer',
        'fb', 'instagram', 'twitter', 'youtube', 'tiktok', 'image', 'favicon'];


    public static function saveEdit($data, $request = null)
    {
        $setting = Setting::find(1);
        if ($setting === null) {
            $setting = new Setting($data);
            $setting->save();
        } else {
            $setting->fill($data);
            $setting->update();
        }
        
        if ($request->hasFile('image') != false && $request != null) {
            $get_image1 = $request->file('image');
            $name_image1 = rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['image'] = $name_image1;
                Setting::deleteImageWithImage(array('id' => $request->carusel_id), 'image');
                $setting = Setting::find(1);
                $setting->image = $name_image1;
                $setting->update();
            }
        }
        
        if ($request->hasFile('favicon') != false && $request != null) {
            $get_image1 = $request->file('favicon');
            $name_image1 = rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['image'] = $name_image1;
                Setting::deleteImageWithImage(array('id' => $request->carusel_id), 'favicon');
                $setting = Setting::find(1);
                $setting->favicon = $name_image1;
                $setting->update();
            }
        }

        return $setting;
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $setting = Setting::where($data_delete)->first();
        if ($setting != null) {
            $nombre_imagen = $setting->$name_image;
            @unlink('files/'.$nombre_imagen);
        }
    }

    public function get()
    {
        return Setting::find(1);
    }

}
