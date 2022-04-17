<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetCarusel extends Model
{
    use HasFactory;
    protected $table = 'widget_carusel';
    protected $fillable = [
        'widget_id', 'imagen1', 'imagen2', 'imagen3', 'imagen4',
        'imagen5', 'imagen6', 'imagen7', 'imagen8', 'imagen9',
        'imagen10', 'is_template'
    ];

    public static function saveEdit($data, $page, $carusel_id = null)
    {
        if ($carusel_id == null) {
            $widget = new WidgetCarusel($data);
            $widget->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $widget->id,
                'id_rel' => 2
            );
            WidgetBuilder::saveEdit($data_page);
        } else {
            $widget = WidgetCarusel::find($carusel_id);
            $widget->fill($data);
            $widget->update();
        }
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $carusel = WidgetCarusel::where($data_delete)->first();
        if ($carusel != null) {
            $nombre_imagen = $carusel->$name_image;
            @unlink('files/'.$nombre_imagen);
        }
    }
}
