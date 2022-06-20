<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetBuilder extends Model
{
    use HasFactory;
    protected $table = "widget_builders";
    protected $fillable = [
        'builder_id', 'id_rel', 'widget_id', 'order'
    ];

    public static function saveEdit($data)
    {
        $widget = WidgetBuilder::where($data)->count();
        if ($widget === 0) {
            $page = new WidgetBuilder($data);
            $page->save();
        }
    }

    public static function setOrderBuilder($data, $order = null, $is_edit = false)
    {
        if ($is_edit == false) {
            $builder = new WidgetBuilder($data);
            $builder->save();
        } else {
            $builder = WidgetBuilder::where($data);
            $builder->update(['order' => $order]);
        }
        return $builder;
    }

    public static function getMyWidgets($page)
    {
        $widgets = WidgetBuilder::where('builder_id', $page)->orderBy('order', 'ASC')->orderBy('order', 'ASC')->get()->toArray();
        return $widgets;
    }

    //*Relaciones
    public function pageHeader($widget_id, $type)
    {
        $widget = WidgetBuilder::select('widget_headers.image', 'widget_headers.title', 'phone', 'phone2', 'widget_headers.id')
            ->join('widget_headers', 'widget_headers.id', '=', 'widget_builders.widget_id')
            ->where(['widget_headers.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }

    public function pageCarusel($widget_id, $type)
    {
        $widget = WidgetBuilder::select('imagen1', 'imagen2', 'imagen3', 'widget_carusel.id')
            ->join('widget_carusel', 'widget_carusel.id', '=', 'widget_builders.widget_id')
            ->where(['widget_carusel.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }
    public function pageTitle($widget_id, $type)
    {
        $widget = WidgetBuilder::select('content', 'widget_texts.id')
            ->join('widget_texts', 'widget_texts.id', '=', 'widget_builders.widget_id')
            ->where(['widget_texts.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }
    
    public function pageTwoColumns($widget_id, $type)
    {
        $widget = WidgetBuilder::select('title', 'subtitle', 'description', 'image', 'widget_two_columns.id')
            ->join('widget_two_columns', 'widget_two_columns.id', '=', 'widget_builders.widget_id')
            ->where(['widget_two_columns.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }
    
    public function pageParallax($widget_id, $type)
    {
        $widget = WidgetBuilder::select('widget_parallaxs.id', 'image')
            ->join('widget_parallaxs', 'widget_parallaxs.id', '=', 'widget_builders.widget_id')
            ->where(['widget_parallaxs.id' => $widget_id, 'id_rel' => $type])->get();

        return $widget;
    }

    public function pageVideo($widget_id, $type)
    {
        $widget = WidgetBuilder::select('widget_videos.id', 'title', 'subtitle', 'description', 'video')
            ->join('widget_videos', 'widget_videos.id', '=', 'widget_builders.widget_id')
            ->where(['widget_videos.id' => $widget_id, 'id_rel' => $type])->get();

        return $widget;
    }
    
    public function pageProduct($widget_id, $type)
    {
        $widget = WidgetBuilder::select('content_products.id', 'name')
            ->join('content_products', 'content_products.id', '=', 'widget_builders.widget_id')
            ->where(['content_products.id' => $widget_id, 'id_rel' => $type])->get();

        return $widget;
    }
    
    public function pageGallery($widget_id, $type)
    {
        $widget = WidgetBuilder::select('widget_galleries.id', 'imagen1', 'imagen2', 'imagen3', 'imagen4', 'imagen5', 'imagen6')
            ->join('widget_galleries', 'widget_galleries.id', '=', 'widget_builders.widget_id')
            ->where(['widget_galleries.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }
    
    public function pageContact($widget_id, $type)
    {
        $widget = WidgetBuilder::select('widget_contacts.id', 'name')
            ->join('widget_contacts', 'widget_contacts.id', '=', 'widget_builders.widget_id')
            ->where(['widget_contacts.id' => $widget_id, 'id_rel' => $type])->get();
        return $widget;
    }

    public function elementsContact($contact_id)
    {
        return ContactElement::where('widget_contact_id', $contact_id)->get();
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
                @unlink('files/' . $widget->$name_image);
                if ($widget != null) {
                    $widget->$name_image = '';
                    $widget->update();
                }
                break;
            
            case 'Parallax':
                $widget = WidgetParallax::find($widget_id);
                @unlink('files/' . $widget->$name_image);
                if ($widget != null) {
                    $widget->$name_image = '';
                    $widget->update();
                }
                break;
            
            case 'Galería':
                $widget = WidgetGallery::find($widget_id);
                @unlink('files/' . $widget->$name_image);
                if ($widget != null) {
                    $widget->$name_image = '';
                    $widget->update();
                }
                break;

            default:
                $widget = WidgetHeader::find($widget_id)->first();
                @unlink('files/' . $widget->image);
                if ($widget != null) {
                    $widget->image = '';
                    $widget->update();
                }
                break;
        }
        return $widget;
    }
}
