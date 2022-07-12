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

    public static function getById($id)
    {
        return WidgetHeader:: select('widget_headers.id as id', 'image', 'title', 'phone', 'phone2', 'widget_builders.order')
                    ->where(['widget_headers.id'=> $id, 'id_rel' => 1])
                    ->join('widget_builders', 'widget_builders.widget_id', '=', 'widget_headers.id')->first();
    }

    public static function rules()
    {
        return
        [
            'header.title' => 'required',
        ];
    }

    public static function saveEdit($data, $page, $header_id = 'null')
    {
        $data_page = array(
            'builder_id' => $page,
            'id_rel' => 1,
        );
        if ($header_id != 'null') {
            $widget_header    = WidgetHeader::find($header_id);
            $widget_header->fill($data);
            $widget_header->update();

            $data_page['widget_id'] = $widget_header->id;
            WidgetBuilder::setOrderBuilder($data_page, $data['order'], true);
        } else {
            $widget_header = new WidgetHeader($data);
            $widget_header->save();
            $data_page['order'] = $data['order'];
            $data_page['widget_id'] =$widget_header->id;
            WidgetBuilder::setOrderBuilder($data_page, null);
        }
        
        return $widget_header;
    }
}
