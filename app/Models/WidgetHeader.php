<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'widget_id', 'image', 'title', 'phone', 'phone2'
    ];

    public static function rules()
    {
        return
        [
            'header.title' => 'required',
        ];
    }

    public static function saveEdit($data, $page, $header_id = null)
    {
        
        if ($header_id != 'null') {
            $widget_header    = WidgetHeader::find($header_id);
            $widget_header->fill($data);
            $widget_header->update();
        } else {
            $widget_header = new WidgetHeader($data);
            $widget_header->save();
            $data_page = array(
                'builder_id' => $page,
                'widget_id' => $widget_header->id,
                'id_rel' => 1
            );
            WidgetBuilder::saveEdit($data_page);
        }
        
        return $widget_header;
    }
}
