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

    public static function saveElement($request)
    {
        $data = $request->data;

        if ($request->hasFile('imagen') != false) {
            $get_image1 = $request->file('imagen');
            $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();

            if ($get_image1->move('files', $name_image1)) {
                $data['image'] = $name_image1;
                WidgetProduct::deleteImageWithImage(array('id' => $request->gallery_id), 'image');
            }
        }
        if ($request->product_id == null) {
            $product = new WidgetProduct($data);
            $product->save();
        } else {
            $product = WidgetProduct::find($request->product_id);
            $product->fill($data);
            $product->update();
        }
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $carusel = WidgetProduct::where($data_delete)->first();
        if ($carusel != null) {
            $nombre_imagen = $carusel->$name_image;
            @unlink('files/'.$nombre_imagen);
        }
    }
}
