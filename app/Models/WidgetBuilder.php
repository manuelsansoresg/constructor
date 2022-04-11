<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetBuilder extends Model
{
    use HasFactory;
    protected $table = "widget_builders";
    protected $fillable = [
        'builder_id', 'id_rel' , 'widget_id'
    ];

    public static function saveEdit($data)
    {
        $widget = WidgetBuilder::where($data)->count();
        if ($widget === 0) {
            $page = new WidgetBuilder($data);
            $page->save();
        }
    }

    public static function getMyWidgets($page)
    {
        $widgets = WidgetBuilder::where('builder_id', $page)->orderBy('created_at', 'DESC')->get()->toArray();
        return $widgets;
    }

    //*Relaciones
    public function pageHeader($widget_id, $type)
    {
        $widget = WidgetBuilder::
                    select('widget_headers.image', 'widget_headers.title', 'phone', 'phone2', 'widget_headers.id')
                    ->join('widget_headers', 'widget_headers.id', '=', 'widget_builders.widget_id')
                    ->where(['widget_headers.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }
}
