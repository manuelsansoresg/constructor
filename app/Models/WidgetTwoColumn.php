<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetTwoColumn extends Model
{
    use HasFactory;

    protected $fillable = [
        'widget_id', 'title', 'subtitle', 'description', 'image'
    ];

    public static function getById($id)
    {
        return WidgetTwoColumn:: select('widget_two_columns.id as id', 'title', 'subtitle', 'description', 'image', 'widget_builders.order')
                    ->where(['widget_two_columns.id'=> $id, 'id_rel' => 4])
                    ->join('widget_builders', 'widget_builders.widget_id', '=', 'widget_two_columns.id')->first();
    }

    public static function saveEdit($data, $page, $text_id = null)
    {
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 4
        );

        if ($text_id == 'null') {
            $text = new WidgetTwoColumn($data);
            $text->save();
            
            $data_page['order'] = $data['order'];
            $data_page['widget_id'] =$text->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            $text = WidgetTwoColumn::find($text_id);
            $text->fill($data);
            $text->update();

            $data_page['widget_id'] = $text->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $carusel = WidgetTwoColumn::where($data_delete)->first();
        if ($carusel != null) {
            $nombre_imagen = $carusel->$name_image;
            @unlink('files/'.$nombre_imagen);
        }
    }

}
