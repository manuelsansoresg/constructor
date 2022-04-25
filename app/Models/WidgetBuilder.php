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
    public function pageTitle($widget_id, $type)
    {
        $widget = WidgetBuilder::
                    select('content', 'widget_texts.id')
                    ->join('widget_texts', 'widget_texts.id', '=', 'widget_builders.widget_id')
                    ->where(['widget_texts.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }

    public static function editWidget($widget_id, $name_widget)
    {
        switch ($name_widget) {
            case 'Slider':
                $widget = WidgetCarusel::find($widget_id)->toArray();
                break;
            case 'Texto':
                $widget = WidgetText::find($widget_id)->toArray();
                break;
            
            default:
                    $widget = WidgetHeader::find($widget_id)->toArray();
                break;
        }
        return $widget;
    }

    public static function deleteImage($widget_id, $name_widget, $name_image = null)
    {
        switch ($name_widget) {
            case 'Slider':
                    $widget = WidgetCarusel::find($widget_id);
                    @unlink('files/'.$widget->$name_image);
                    $widget->$name_image='';
                    $widget->update();
                break;
            
            default:
                    $widget = WidgetHeader::find($widget_id)->first();
                    @unlink('files/'.$widget->image);
                    $widget->image='';
                    $widget->update();
                break;
        }
        return $widget;
    }
}
