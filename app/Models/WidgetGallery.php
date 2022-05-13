<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'widget_id',
        'imagen1',
        'imagen2',
        'imagen3',
        'imagen4',
        'imagen5',
        'imagen6',
        'imagen7',
        'imagen8',
        'imagen9',
        'imagen10',
        'is_template'
    ];

    
    public static function saveEdit($data, $page, $text_id = null)
    {
        if ($text_id == 'null') {
            $text = new WidgetGallery($data);
            $text->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $text->id,
                'id_rel' => 8
            );
            WidgetBuilder::saveEdit($data_page);
        } else {
            $text = WidgetGallery::find($text_id);
            $text->fill($data);
            $text->update();
        }
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $carusel = WidgetGallery::where($data_delete)->first();
        if ($carusel != null) {
            $nombre_imagen = $carusel->$name_image;
            @unlink('files/'.$nombre_imagen);
        }
    }
}
