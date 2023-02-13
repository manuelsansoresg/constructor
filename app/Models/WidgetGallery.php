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
        'linkimagen1',
        'linkimagen2',
        'linkimagen3',
        'linkimagen4',
        'linkimagen5',
        'linkimagen6',
        'linkimagen7',
        'linkimagen8',
        'linkimagen9',
        'linkimagen10',
        'is_template',
        'size_col_image1',
        'size_col_image2',
        'size_col_image3',
        'size_col_image4',
        'size_col_image5',
        'size_col_image6',
        'size_col_image7',
        'size_col_image8',
        'size_col_image9',
        'size_col_image10',
    ];

    public static function getById($id)
    {
        return WidgetGallery::select(
            'widget_galleries.id as id',
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
            'widget_builders.order',
            'size_col_image1',
            'size_col_image2',
            'size_col_image3',
            'size_col_image4',
            'size_col_image5',
            'size_col_image6',
            'size_col_image7',
            'size_col_image8',
            'size_col_image9',
            'size_col_image10',
        )
            ->where(['widget_galleries.id' => $id, 'id_rel' => 8])
            ->join('widget_builders', 'widget_builders.widget_id', '=', 'widget_galleries.id')->first();
    }


    public static function saveEdit($data, $page, $text_id = null)
    {
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 8
        );

        if ($text_id == 'null') {
            $text = new WidgetGallery($data);
            $text->save();

            $data_page['order'] = $data['order'];
            $data_page['widget_id'] = $text->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            $text = WidgetGallery::find($text_id);
            $text->fill($data);
            $text->update();

            $data_page['widget_id'] = $text->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
    }

    public static function deleteImageWithImage($data_delete, $name_image)
    {
        $carusel = WidgetGallery::where($data_delete)->first();
        if ($carusel != null) {
            $nombre_imagen = $carusel->$name_image;
            @unlink('files/' . $nombre_imagen);
        }
    }
}
