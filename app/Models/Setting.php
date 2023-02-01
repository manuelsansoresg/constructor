<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefono', 'telefono2', 'correo', 'correo2', 'direccion', 'leyenda_footer',
        'fb', 'instagram', 'twitter', 'youtube', 'tiktok', 'image', 'favicon', 'domain_id'];


    public static function saveEdit($data, $request = null)
    {
        $setting = Setting::where('domain_id', Session::get('domain_id'));
        if ($setting->count() === 0) {
            $setting = new Setting($data);
            $setting->save();
        } else {
            $setting->update($data);
        }
        if ($request->hasFile('image') != false && $request != null) {
            $get_image1 = $request->file('image');
            $name_image1 = rand(1, 999).'-'.$get_image1->getClientOriginalName();
            
            if ($get_image1->move('files', $name_image1)) {
                $data_images['image'] = $name_image1;
                Setting::deleteImageWithImage(array('id' => $request->carusel_id), 'image');
                $setting = Setting::where('domain_id', Session::get('domain_id'));
                $setting->update(['image' => $name_image1]);
            }
        }
        
        if ($request->hasFile('favicon') != false && $request != null) {
            $get_image1 = $request->file('favicon');
            $name_image1 = rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data_images['image'] = $name_image1;
                Setting::deleteImageWithImage(array('id' => $request->carusel_id), 'favicon');
                $setting = Setting::where('domain_id', Session::get('domain_id'));
                $setting->update(['favicon' => $name_image1]);
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

    public static function get()
    {
        $domain = Session::get('domain_id');
        $setting  = Setting::where('domain_id', $domain)->first();
        if ($setting == null) {
            $setting = Setting::create(['domain_id' => $domain]);
            Builder::create(['name' => 'Inicio', 'slug' => '/', 'setting_id' => $setting->id]);
        }
        return $setting;
    }
}
