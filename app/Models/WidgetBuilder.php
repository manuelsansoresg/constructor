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
        $widgets = WidgetBuilder::where('builder_id', $page)->orderBy('created_at', 'ASC')->get()->toArray();
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

    public function pageCarusel($widget_id, $type)
    {
        $widget = WidgetBuilder::
                    select('imagen1', 'imagen2', 'imagen3', 'widget_carusel.id')
                    ->join('widget_carusel', 'widget_carusel.id', '=', 'widget_builders.widget_id')
                    ->where(['widget_carusel.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }

    public static function editWidget($widget_id, $type)
    {
        switch ($type) {
            case 'name_widget':
                # code...
                break;
            
            default:
                    $widget = WidgetHeader::find($widget_id)->toArray();
                break;
        }
        return $widget;
    }
}
