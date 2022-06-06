<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetParallax extends Model
{
    use HasFactory;

    protected $table = 'widget_parallaxs';

    protected $fillable = [
        'widget_id', 'image', 'text'
    ];

    public static function getById($id)
    {
        return WidgetParallax:: select('widget_parallaxs.id as id', 'image', 'text', 'widget_builders.order')
                    ->where(['widget_parallaxs.id'=> $id, 'id_rel' => 5])
                    ->join('widget_builders', 'widget_builders.widget_id', '=', 'widget_parallaxs.id')->first();
    }

    public static function saveEdit($data, $page, $text_id = null)
    {
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 5
        );

        if ($text_id == 'null') {
            $text = new WidgetParallax($data);
            $text->save();
           
            $data_page['order'] = $data['order'];
            $data_page['widget_id'] =$text->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            $text = WidgetParallax::find($text_id);
            $text->fill($data);
            $text->update();

            $data_page['widget_id'] = $text->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $query = WidgetParallax::where($data_delete)->first();
        if ($query != null) {
            $nombre_imagen = $query->$name_image;
            @unlink('files/'.$nombre_imagen);
        }
    }
}
