<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentProduct extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'widget_id'];

    public static function getById($id)
    {
        return ContentProduct:: select('content_products.id as id', 'name', 'widget_builders.order')
                    ->where(['content_products.id'=> $id, 'id_rel' => 6])
                    ->join('widget_builders', 'widget_builders.widget_id', '=', 'content_products.id')->first();
    }

    public static function saveEdit($request, $page, $product_id = null)
    {
        $data = $request->data;
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 6
        );
        if ($product_id == 'null') {
            $product = new ContentProduct($data);
            $product->save();
           
            $data_page['order'] = $data['order'];
            $data_page['widget_id'] =$product->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            $product = ContentProduct::find($product_id);
            $product->fill($data);
            $product->update();

            $data_page['widget_id'] = $product->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
        //* elementos del producto
        $id             = $request->id;
        $title          = $request->title;
        $imagen         = $request->imagen;
        $price          = $request->price;
        $discount       = $request->discount;
        $description    = $request->description;

        for ($i=0; $i < count($id); $i++) {

            //*datos del producto
            $data_product = array(
                'title' => $title[$i],
                'price' => $price[$i],
                'discount' => $discount[$i],
                'description' => $description[$i],
            );


            //*imagen
            if ($request->hasFile($imagen[$i]) != false) {
                $get_image1 = $request->file($imagen[$i]);
                $name_image1 = 'gallery-'.rand(1, 999).'-'.$get_image1->getClientOriginalName();
    
                if ($get_image1->move('files', $name_image1)) {
                    $data_product['image'] = $name_image1;
                    WidgetProduct::deleteImageWithImage(array('id' => $id[$i]), 'image');
                }
            }

            
            $product = WidgetProduct::find($id[$i]);
            $product->fill($data_product);
            $product->update();
        }
    }
}
