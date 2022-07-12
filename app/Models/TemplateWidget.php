<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateWidget extends Model
{
    use HasFactory;
    protected $fillable = [
        'widget_id',
        'title',
        'type'
    ];

    public static function isExist($widget_id, $type)
    {
        $exist = TemplateWidget::where(['widget_id' => $widget_id, 'type' => $type])->count();
        return array('status' => ($exist === 0)? 200 : 500);
    }

    public static function saveTemplate($request)
    {
        $data = $request->data;
        $template = new TemplateWidget($data);
        $template->save();
    }

    public static function deleteTemplate($widget_id, $type)
    {
        $exist = TemplateWidget::where(['widget_id' => $widget_id, 'type' => $type]);
        $exist->delete();
    }

    public static function createTemplate($request)
    {
        $template_id    = $request->section_template;
        $page_actual    = $request->page_actual;
        $status         = 500;
        $path           = 'files/';

        $get_template = TemplateWidget::find($template_id);
        if ($get_template !== null) {
            $widget_id    = $get_template->widget_id;
            $type         = $get_template->type;
            //*obtener el widget a clonar
            switch ($type) {
                case '1':
                    # encabezado
                    $get_widget       = WidgetHeader::find($widget_id);
                    $nuevo_fichero    = '';
                    if ($get_widget->image != '') {
                        $fichero          = $path.$get_widget->image;
                        $nuevo_fichero    = 'clone-'.$get_widget->image;
                        copy($fichero, $path.$nuevo_fichero);
                    }
                    
                    $data_widget = array(
                        'widget_id' => $type,
                        'image' => $nuevo_fichero,
                        'title' => $get_widget->title,
                        'phone' => $get_widget->phone,
                        'phone2' => $get_widget->phone2,
                        'order' => 0,
                        'is_template' => 1

                    );

                    WidgetHeader::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '2':
                    # slider
                    $get_widget   = WidgetCarusel::find($widget_id);
                    $imagen1      = '';
                    $imagen2      = '';
                    $imagen3      = '';
                    //*clonar imagenes
                    if ($get_widget->imagen1 != '') {
                        $fichero    = $path.$get_widget->imagen1;
                        $imagen1    = 'clone-'.$get_widget->imagen1;
                        copy($fichero, $path.$imagen1);
                    }

                    if ($get_widget->imagen2 != '') {
                        $fichero    = $path.$get_widget->imagen2;
                        $imagen2    = 'clone-'.$get_widget->imagen2;
                        copy($fichero, $path.$imagen2);
                    }

                    if ($get_widget->imagen3 != '') {
                        $fichero    = $path.$get_widget->imagen3;
                        $imagen3    = 'clone-'.$get_widget->imagen3;
                        copy($fichero, $path.$imagen3);
                    }
                    $data_widget = array(
                        'widget_id' => $type,
                        'imagen1' => $imagen1,
                        'imagen2' => $imagen2,
                        'imagen3' => $imagen3,
                        'is_template' => 1,
                        'order' => 0,
                    );
                 
                    WidgetCarusel::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '3':
                    # texto
                    $get_widget = WidgetText::find($widget_id);
                    $data_widget = array(
                        'widget_id' => $type,
                        'content' => $get_widget->content,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    WidgetText::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '4':
                    # 2 columnas
                    $get_widget   = WidgetTwoColumn::find($widget_id);
                    $image        = '';
                    if ($get_widget->image != '') {
                        $fichero    = $path.$get_widget->image;
                        $image    = 'clone-'.$get_widget->image;
                        copy($fichero, $path.$image);
                    }
                    $data_widget = array(
                        'widget_id' => $type,
                        'title' => $get_widget->title,
                        'subtitle' => $get_widget->subtitle,
                        'description' => $get_widget->description,
                        'image' => $image,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    WidgetTwoColumn::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '5':
                    # parallax
                    $get_widget = WidgetParallax::find($widget_id);
                    $image        = '';
                    if ($get_widget->image != '') {
                        $fichero    = $path.$get_widget->image;
                        $image    = 'clone-'.$get_widget->image;
                        copy($fichero, $path.$image);
                    }

                    $data_widget = array(
                        'widget_id' => $type,
                        'image' => $image,
                        'text' => $get_widget->text,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    WidgetParallax::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '6':
                    # productos
                    $get_widget = ContentProduct::find($widget_id);
                    $data_widget = array(
                        'widget_id' => $type,
                        'name' => $get_widget->name,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    $content_product = ContentProduct::saveEdit($data_widget, $page_actual, 'null', true);
                    WidgetProduct::fillProductWithContent($content_product->id, $get_widget->id);
                    $status = 200;
                    break;
                case '7':
                    # video
                    $get_widget = WidgetVideo::find($widget_id);
                    $data_widget = array(
                        'widget_id' => $type,
                        'title' => $get_widget->title,
                        'subtitle' => $get_widget->subtitle,
                        'description' => $get_widget->description,
                        'video' => $get_widget->video,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    $content_product = WidgetVideo::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '8':
                    # galeria
                    $get_widget   = WidgetGallery::find($widget_id);
                    $imagen1      = '';
                    $imagen2      = '';
                    $imagen3      = '';
                    $imagen4      = '';
                    $imagen5      = '';
                    $imagen6      = '';
                    //*clonar imagenes
                    if ($get_widget->imagen1 != '') {
                        $fichero    = $path.$get_widget->imagen1;
                        $imagen1    = 'clone-'.$get_widget->imagen1;
                        copy($fichero, $path.$imagen1);
                    }

                    if ($get_widget->imagen2 != '') {
                        $fichero    = $path.$get_widget->imagen2;
                        $imagen2    = 'clone-'.$get_widget->imagen2;
                        copy($fichero, $path.$imagen2);
                    }

                    if ($get_widget->imagen3 != '') {
                        $fichero    = $path.$get_widget->imagen3;
                        $imagen3    = 'clone-'.$get_widget->imagen3;
                        copy($fichero, $path.$imagen3);
                    }
                    if ($get_widget->imagen4 != '') {
                        $fichero    = $path.$get_widget->imagen4;
                        $imagen4    = 'clone-'.$get_widget->imagen4;
                        copy($fichero, $path.$imagen4);
                    }
                    if ($get_widget->imagen5 != '') {
                        $fichero    = $path.$get_widget->imagen5;
                        $imagen5    = 'clone-'.$get_widget->imagen5;
                        copy($fichero, $path.$imagen5);
                    }
                    if ($get_widget->imagen6 != '') {
                        $fichero    = $path.$get_widget->imagen6;
                        $imagen6    = 'clone-'.$get_widget->imagen6;
                        copy($fichero, $path.$imagen6);
                    }

                    $data_widget = array(
                        'widget_id' => $type,
                        'imagen1' => $imagen1,
                        'imagen2' => $imagen2,
                        'imagen3' => $imagen3,
                        'imagen4' => $imagen4,
                        'imagen5' => $imagen5,
                        'imagen6' => $imagen6,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    $content_product = WidgetGallery::saveEdit($data_widget, $page_actual, 'null');
                    $status = 200;
                    break;
                case '9':
                    # contacto
                    $get_widget = WidgetContact::find($widget_id);
                    $data_widget = array(
                        'widget_id' => $type,
                        'name' => $get_widget->name,
                        'is_template' => 1,
                        'order' => 0,
                    );
                    $content_product = WidgetContact::createContact($data_widget, $page_actual);
                    ContactElement::fillElementWithContact($content_product->id, $get_widget->id);
                    $status = 200;
                    break;
            }
        }
        return $status;
    }
}
