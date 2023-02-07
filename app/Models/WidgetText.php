<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetText extends Model
{
    use HasFactory;
    protected $fillable = ['widget_id', 'content', 'is_template', 'align', 'height', 'background_color'];

    public static function getById($id)
    {
        return WidgetText:: select('widget_texts.id as id', 'content', 'widget_builders.order', 'align', 'height', 'background_color')
                    ->where(['widget_texts.id'=> $id, 'id_rel' => 3])
                    ->join('widget_builders', 'widget_builders.widget_id', '=', 'widget_texts.id')->first();
    }

    public static function saveEdit($data, $page, $text_id = null)
    {
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 3
        );

        if ($text_id == 'null') {
            $text = new WidgetText($data);
            $text->save();
            
            $data_page['order'] = $data['order'];
            $data_page['widget_id'] =$text->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        } else {
            $text = WidgetText::find($text_id);
            $text->fill($data);
            $text->update();

            $data_page['widget_id'] = $text->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        }
    }
}
