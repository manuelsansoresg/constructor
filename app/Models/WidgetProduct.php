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
        if ($request->product_id == 'null') {
            $product = new WidgetProduct($data);
            $product->save();
        } else {
            $product = WidgetProduct::find($request->product_id);
            $product->fill($data);
            $product->update();
        }
    }

    public function saveProduct($data)
    {
        $product = new WidgetProduct($data);
        $product->save();
    }

    public static function fillProductWithContent($content_product_id, $content_old_product_id)
    {
        $get_content        = ContentProduct::find($content_product_id);
        $get_old_content    = ContentProduct::find($content_old_product_id);

        if ($get_old_content !== null) {
            $content_product_id    = $get_old_content->id;
            $products     = WidgetProduct::where('content_product_id', $content_product_id)->get();
            $path         = 'files/';

            foreach ($products as $product) {
                $image        = '';
                if ($product->image != '') {
                    $fichero    = $path.$product->image;
                    $image    = 'clone-'.$product->image;
                    copy($fichero, $path.$image);
                }

                $data_product = array(
                    'content_product_id' => $get_content->id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'description' => $product->description,
                    'image' => $image,
                );
                $product = new WidgetProduct($data_product);
                $product->save();
            }
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
