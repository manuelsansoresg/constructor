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

    public static function saveEdit($data, $page, $product_id = null)
    {
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
    }
}
