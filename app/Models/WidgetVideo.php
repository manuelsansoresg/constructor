<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'subtitle', 'description', 'video'
    ];

    public static function saveEdit($data, $page, $text_id = null)
    {
        if ($text_id == 'null') {
            $text = new WidgetVideo($data);
            $text->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $text->id,
                'id_rel' => 7
            );
            WidgetBuilder::saveEdit($data_page);
        } else {
            $text = WidgetVideo::find($text_id);
            $text->fill($data);
            $text->update();
        }
    }

}
