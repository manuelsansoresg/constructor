<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'widget_id', 'image', 'text', 'is_template'
    ];

    public static function saveCarusel($data, $page)
    {
        $widget_id = $data['widget_id'];
        $images = $data['images'];

        foreach ($images as $image) {
            $data_image = array(
                'widget_id' => $widget_id,
                'image' => $image
            );
            $carusel = new WidgetGallery($data_image);
            $carusel->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $carusel->id,
                'id_rel' => 2
            );
            WidgetBuilder::saveEdit($data_page);
        }
    }

    
}
