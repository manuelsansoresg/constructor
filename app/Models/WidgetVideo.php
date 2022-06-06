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

    public static function getById($id)
    {
        return WidgetVideo:: select('widget_videos.id as id',  'title', 'subtitle', 'description', 'video', 'widget_builders.order')
                    ->where(['widget_videos.id'=> $id, 'id_rel' => 7])
                    ->join('widget_builders', 'widget_builders.widget_id', '=', 'widget_videos.id')->first();
    }

    public static function saveEdit($data, $page, $text_id = null)
    {
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 7
        );

        if ($text_id == 'null') {
            $text = new WidgetVideo($data);
            $text->save();
           
            $data_page['order'] = $data['order'];
            $data_page['widget_id'] =$text->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            $text = WidgetVideo::find($text_id);
            $text->fill($data);
            $text->update();

            $data_page['widget_id'] = $text->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
    }

}
