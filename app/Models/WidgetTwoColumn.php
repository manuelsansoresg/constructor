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

    public static function saveEdit($data, $page, $text_id = null)
    {
        if ($text_id == 'null') {
            $text = new WidgetTwoColumn($data);
            $text->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $text->id,
                'id_rel' => 4
            );
            WidgetBuilder::saveEdit($data_page);
        } else {
            $text = WidgetTwoColumn::find($text_id);
            $text->fill($data);
            $text->update();
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
