<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetText extends Model
{
    use HasFactory;
    protected $fillable = ['widget_id', 'content', 'is_template'];

    public static function saveEdit($data, $page, $text_id = null)
    {
        if ($text_id == null) {
            $text = new WidgetText($data);
            $text->save();

            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $text->id,
                'id_rel' => 3
            );
            WidgetBuilder::saveEdit($data_page);
        } else {
            $text = WidgetText::find($text_id);
            $text->fill($data);
            $text->update();
        }
    }
}
