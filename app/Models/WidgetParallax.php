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

    public static function saveEdit($data, $page, $text_id = null)
    {
        if ($text_id == 'null') {
            $text = new WidgetParallax($data);
            $text->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $text->id,
                'id_rel' => 5
            );
            WidgetBuilder::saveEdit($data_page);
        } else {
            $text = WidgetParallax::find($text_id);
            $text->fill($data);
            $text->update();
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
