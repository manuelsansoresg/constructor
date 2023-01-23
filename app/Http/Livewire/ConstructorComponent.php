<?php

namespace App\Http\Livewire;

use App\Lib\LImage;
use App\Models\Builder;
use App\Models\ContactElement;
use App\Models\ContentProduct;
use App\Models\Section;
use App\Models\Setting;
use App\Models\TemplateWidget;
use App\Models\Widget;
use App\Models\WidgetBuilder;
use App\Models\WidgetCarusel;
use App\Models\WidgetContact;
use App\Models\WidgetGallery;
use App\Models\WidgetHeader;
use App\Models\WidgetParallax;
use App\Models\WidgetProduct;
use App\Models\WidgetText;
use App\Models\WidgetTwoColumn;
use App\Models\WidgetVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConstructorComponent extends Component
{
    use WithFileUploads;

    public $page_actual;
    public $pages;
    public $widgets; //*lista de secciones
    public $templates; //*lista de templates
    public $widget; //*valor entero del select
    public $is_edit = false;
    public $link_preview = '/data';
    //*valores de los widgets a guardar
    public $widget_id = null;
    public $header;
    public $header_imagen; //*modelo nombre caja input para adjuntar
    public $header_my_image; //*variable para asignar la imagen
    //*slider carusel
    public $carusel;
    //*modelo para adjuntar imagenes carusel
    public $carusel_imagen1;
    public $carusel_imagen2;
    public $carusel_imagen3;
    //*variables para asignar imagenes en carusel
    public $carusel_my_image1;
    public $carusel_my_image2;
    public $carusel_my_image3;

    //*title
    public $title;
    //*datos guardados widgets
    public $my_widgets = null;

    public $builder;
    public $section_tab;

    public $mypage;

    public $domain;

    protected $validationAttributes = [
        'header.title' => 'Título',
    ];

    protected $listeners = [
        'updatePages', 'updateSection', 'setTitle', 'updateImage', 'updateMyWidgets', 'resetComponents', 'setPage',
        'deletePage'
    ];

    public function mount(Request $request)
    {
        $this->domain         = $request->session()->get('domain_id');
        $this->mypage         = (isset($_GET['page'])) ? $_GET['page'] : '/';
        $this->setParamsPage($this->mypage);
        $this->section_tab    = 1;
        /* if ($this->page_actual->slug != "inicio") {
        } */
        
    }

    public function setParamsPage($page)
    {
        $this->page_actual    = Builder::where('slug', $page)->first();
        
        if ($this->page_actual != null) {
            $this->builder        = $this->page_actual->toArray();
            $this->link_preview   = $this->page_actual->slug;
            $this->my_widgets     = WidgetBuilder::getMyWidgets($this->page_actual->id);
            $this->pages          = Builder::getAll();
            $this->widgets        = Widget::all();
            $this->templates      = TemplateWidget::all();
        }
        
    }

    public function render()
    {
        return view('livewire.constructor-component');
    }

    public function setTab($section)
    {
        
        $this->section_tab = $section;
        self::resetComponents();
    }

    public function setPage($page)
    {
        
        $this->setParamsPage($page);
        $slug = $this->page_actual->slug;
        return redirect('/admin/home?page='.$slug);
        
    }

    

    public function editWidget($widget_id, $name_widget)
    {
        $get_widget             = Widget::where('name', $name_widget)->first();
        $this->widget           = $get_widget->id;
        $model                  = $get_widget->execute_widget;
        $data_widget            = WidgetBuilder::editWidget($widget_id, $name_widget);
        //* sirve para volver dinamicamente la asignacion de una propiedad ejemplo $this->header
        $this->$model           = $data_widget;
        //* sirve para volver dinamicamente la asignacion de una propiedad imagen ejemplo $this->header_imagen
        $this->widget_id        = $data_widget['id'];
        if ($name_widget == 'Encabezado') {
            $this->header_my_image = $data_widget['image'];
        }
        if ($name_widget == 'Slider') {
            $this->carusel_my_image1 = $data_widget['imagen1'];
            $this->carusel_my_image2 = $data_widget['imagen2'];
            $this->carusel_my_image3 = $data_widget['imagen3'];
        }
        if ($name_widget == 'Texto') {
            $this->emit('setSummerTitle', $this->title['content']);
        }
        self::updateSection($get_widget->id);
    }

    public function deleteElementContact($contact_id)
    {
        $element = ContactElement::find($contact_id);
        $element->delete();
        
        self::resetWidget();
    }

    public function deleteTemplate($widget_id, $type)
    {
        $template = TemplateWidget::deleteTemplate($widget_id, $type);
        self::resetWidget();
    }

    public function deleteElementProduct($product_id)
    {
        $element = WidgetProduct::find($product_id);
        @unlink('files/'.$element->image);
        $element->delete();
        
        self::resetWidget();
    }

    public function deleteWidget($widget_id, $name_widget)
    {
        $get_widget = Widget::where('name', $name_widget)->first();
        $data_widget_builder = array(
            'builder_id' => $this->page_actual->id,
            'id_rel' => $get_widget->id,
            'widget_id' => $widget_id
        );
        
        if ($get_widget->execute_widget == 'header') {
            $my_widget = WidgetHeader::find($widget_id);
            @unlink('files/' . $my_widget->image);
            $my_widget->delete();
        }
        
        if ($get_widget->execute_widget == 'carusel') {
            $my_widget = WidgetCarusel::find($widget_id);
            if ($my_widget != null) {
                self::deleteImage($my_widget->id, 'Slider', 'imagen1');
                self::deleteImage($my_widget->id, 'Slider', 'imagen2');
                self::deleteImage($my_widget->id, 'Slider', 'imagen3');
                $my_widget->delete();
            }
        }
        
        if ($get_widget->execute_widget == 'gallery') {
            $my_widget = WidgetGallery::find($widget_id);
            if ($my_widget != null) {
                self::deleteImage($my_widget->id, 'Galería', 'imagen1');
                self::deleteImage($my_widget->id, 'Galería', 'imagen2');
                self::deleteImage($my_widget->id, 'Galería', 'imagen3');
                self::deleteImage($my_widget->id, 'Galería', 'imagen4');
                self::deleteImage($my_widget->id, 'Galería', 'imagen5');
                self::deleteImage($my_widget->id, 'Galería', 'imagen6');
                $my_widget->delete();
            }
        }

        if ($get_widget->execute_widget == 'parallax') {
            $my_widget = WidgetParallax::find($widget_id);
            if ($my_widget != null) {
                self::deleteImage($my_widget->id, 'Parallax', 'image');
                $my_widget->delete();
            }
        }
        
        if ($get_widget->execute_widget == 'two_column') {
            $my_widget = WidgetTwoColumn::find($widget_id);
            if ($my_widget != null) {
                self::deleteImage($get_widget->id, '2 columnas', 'image');
                $my_widget->delete();
            }
        }
        
        if ($get_widget->execute_widget == 'product') {
            $my_widget = ContentProduct::find($widget_id);
            if ($my_widget != null) {
                self::deleteImage($my_widget->id, 'Productos', 'image');
                $my_widget->delete();
            }
        }
        WidgetBuilder::where($data_widget_builder)->delete();
        self::resetWidget();
    }

    public function deletePage($page_id)
    {
        $widget_builders = WidgetBuilder::where('builder_id', $page_id)->get();
        foreach ($widget_builders as $widget_builder) {
            $widget = Widget::find($widget_builder->id_rel);
            if ($widget != null) {
                self::deleteWidget($widget_builder->widget_id, $widget->name);
            }
        }
        Builder::find($page_id)->delete();
        return redirect('/admin/home');
    }
    
    /**
     * Agrega imagenes desde el modal disparado en agregar imagenes desde los widgets que contengan imagen
     *
     * @param Request $request
     * @return void
     */
    public function imageAdd(Request $request)
    {
        $image = new LImage($request);
        $add = $image->add();
        return $add;
    }

    /**
     * Se dispara en title.js al abrir el modal para editar y asi poder asignar los valores al modal
     *
     * @param int $section_id id= tabla widgets
     * @param int $widget_id id del widget
     * @return void
     */
    public function getDataWidget($section_id, $widget_id, $page_actual)
    {
        switch ($section_id) {
            case '1':
                #encabezado
                $widget = WidgetHeader::getById($widget_id);
                break;
            case '2':
                $widget = WidgetCarusel::getById($widget_id);
                break;
            case '3':
                $widget = WidgetText::getById($widget_id);
                break;
            case '4':
                $widget = WidgetTwoColumn::getById($widget_id);
                break;
            case '5':
                $widget = WidgetParallax::getById($widget_id);
                break;
            case '6':
                $widget = ContentProduct::getById($widget_id);
                break;
            case '7':
                $widget = WidgetVideo::getById($widget_id);
                break;
            case '8':
                $widget = WidgetGallery::getById($widget_id);
                break;
            case '9':
                $widget = ContactElement::getElements($widget_id, $page_actual);
                break;
        }
        return response()->json($widget);
    }

   /**
    * borra la imagen segun widget
    *
    * @param int $widget_id
    * @param string $name_widget = seccion(Encabezado, Slider)..etc
    * @param string $name_image nombre de la imagen en la tabla
    * @return void
    */
    public function deleteImage($widget_id, $name_widget, $name_image = null)
    {
        WidgetBuilder::deleteImage($widget_id, $name_widget, $name_image);
    }

    
    public function storeConfig()
    {
        $save_builder = Builder::saveEdit($this->builder, $this->page_actual->name);
        /* $this->builder    = Builder::where('slug', $save_builder->slug)->first()->toArray();
        self::setParamsPage($save_builder->slug);
        self::resetWidget(); */
        return redirect('/admin/home?page='.$save_builder->slug);
    }
    

    public function storeTitle()
    {
        
        
        $this->my_widgets = WidgetBuilder::getMyWidgets($this->page_actual->id);
        self::resetWidget();
    }


    public function storePage(Request $request)
    {
        $setting = Setting::get();
        
        $title = $request->title;
        $data_title = array(
            'name' => $title,
            'slug' => Str::slug($title),
            'setting_id' => $setting->id
        );
        $builder = new Builder($data_title);
        $builder->save();
    }

    /**
     * salcar pestaña configuracion por página
     *
     * @return void
     */
    public function storeConfiguration(Request $request)
    {
        $builder = $request->builder;
        $save_builder = Builder::saveEdit($builder, $request->page_actual);
        return redirect('/admin/home?page='.$save_builder->slug);
    }

    /**
     ** Actualizar el listado de paginas al dar de alta en el javacript title.js
     *
     * @return void
     */
    public function updatePages()
    {
        $this->pages = Builder::getAll();
        $this->emit('setTree');
    }
    
    public function updateSection($widget_id)
    {
        $get_widget   = Widget::find($widget_id);
        if ($get_widget !== null) {
            $name_section = '#widget-'.$get_widget->execute_widget;
            $this->widget = $widget_id;
            $this->emit('setScroll', $name_section);
            if ($get_widget->id == 2) { //*widget slider
                $data_images['widget_id']   = $this->widget;
                $carusel                    = WidgetCarusel::saveEdit($data_images, $this->page_actual->id, $this->widget_id);
                $this->carusel = $carusel;
                self::resetWidget();
                self::updateSection($get_widget->id);
            }
            if ($get_widget->id == 3) { //*widget texto
                $this->emit('setSummernote');
            }
        }
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Luego de realizar el adjuntado del modal el js llama a esta funcion para actualizar los nuevos valores del modelo
     * @return void
     */
    public function updateImage()
    {
        $this->my_widgets     = WidgetBuilder::getMyWidgets($this->page_actual->id);
        self::resetWidget();
    }

    /**
     * listener que se ejecuta en los addWidgets.js al guardar cualquier widget para refrescar la lista de widgets
     *
     * @return void
     */
    public function updateMyWidgets()
    {
        $this->my_widgets = WidgetBuilder::getMyWidgets($this->page_actual->id);
    }

    
    public function resetWidget()
    {
        $this->widget           = '';
        $this->header           = '';
        $this->header_imagen    = '';
        $this->widget_id        = null;
        $this->emit('setTree');
        
    }

    public function resetComponents()
    {
        $this->emit('setTree');
    }

    public function createWidget($section_id, $page_actual)
    {
        $path_page    = 'page_widgets/';
        $view         = 'encabezado';
        

        return view($path_page.$view);
    }
}
