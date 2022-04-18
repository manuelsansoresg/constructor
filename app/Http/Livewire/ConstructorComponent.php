<?php

namespace App\Http\Livewire;

use App\Models\Builder;
use App\Models\Section;
use App\Models\Widget;
use App\Models\WidgetBuilder;
use App\Models\WidgetCarusel;
use App\Models\WidgetGallery;
use App\Models\WidgetHeader;
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
    public $widget; //*valor de la seccion
    public $is_edit = false;
    //*valores de los widgets a guardar
    public $widget_id = null;
    public $header;
    public $header_imagen;
    //*slider carusel
    public $carusel;
    public $carusel_imagen1;
    public $carusel_imagen2;
    public $carusel_imagen3;
    //*datos guardados widgets
    public $my_widgets;

    protected $validationAttributes = [
        'header.title' => 'Título',
    ];

    protected $listeners = [
        'updatePages', 'updateSection'
    ];

    public function mount()
    {
        $this->page_actual    = Builder::where('name', 'Inicio')->first();
        $this->pages          = Builder::all();
        $this->widgets        = Widget::all();

        $this->my_widgets     = WidgetBuilder::getMyWidgets($this->page_actual->id);
    }

    public function render()
    {
        return view('livewire.constructor-component');
    }

    public function setPage($page)
    {
        $this->page_actual = $page;
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
        self::updateSection($get_widget->id);
    }

    public function deleteWidget($widget_id, $name_widget)
    {
        $get_widget = Widget::where('name', $name_widget)->first();
        $data_widget_builder = array(
            'builder_id' => $this->page_actual->id,
            'id_rel' => $get_widget->id,
            'widget_id' => $widget_id
        );
        
        WidgetBuilder::where($data_widget_builder)->delete();
        WidgetHeader::find($widget_id)->delete();
        self::resetWidget();
    }

    /**
     * borra la imagen segun widget
     *
     * @param int $widget_id
     * @return void
     */
    public function deleteImage($widget_id, $name_widget, $name_image = null)
    {
        WidgetBuilder::deleteImage($widget_id, $name_widget, $name_image);
        self::editWidget($widget_id, $name_widget);
    }

    public function storeHeader()
    {
        $this->validate(WidgetHeader::rules());
        $this->header['widget_id'] = $this->widget;
        if ($this->header_imagen != null) {
            $imageName = $this->header_imagen->getClientOriginalName();
            $this->header_imagen->storeAs('files', $imageName, 'public_uploads');
            $this->header['image']   = $imageName;

            $get_header = WidgetHeader::find($this->widget_id);
            if ($get_header != null) {
                $imagen_anterior = $get_header->image;
                @unlink('files/'.$imagen_anterior);
            }
        }
        WidgetHeader::saveEdit($this->header, $this->page_actual->id, $this->widget_id);
        $this->my_widgets = WidgetBuilder::getMyWidgets($this->page_actual->id);
        self::resetWidget();
    }

    public function storeCarusel()
    {
        $data_images                = array();
        $data_images['widget_id']   = $this->widget;

        if ($this->carusel_imagen1 != null) {
            $imageName = 'carusel-'.$this->carusel_imagen1->getClientOriginalName();
            $this->carusel_imagen1->storeAs('files', $imageName, 'public_uploads');
            $data_images['imagen1'] = $imageName;
            WidgetCarusel::deleteImageWithImage(array('widget_id' => $this->widget_id), 'imagen1');
        }
        if ($this->carusel_imagen2 != null) {
            $imageName = 'carusel-'.$this->carusel_imagen2->getClientOriginalName();
            $this->carusel_imagen2->storeAs('files', $imageName, 'public_uploads');
            $data_images['imagen2'] = $imageName;
            WidgetCarusel::deleteImageWithImage(array('widget_id' => $this->widget_id), 'imagen2');
        }
        if ($this->carusel_imagen3 != null) {
            $imageName = 'carusel-'.$this->carusel_imagen3->getClientOriginalName();
            $this->carusel_imagen3->storeAs('files', $imageName, 'public_uploads');
            $data_images['imagen3'] = $imageName;
            WidgetCarusel::deleteImageWithImage(array('widget_id' => $this->widget_id), 'imagen3');
        }

        $carusel = WidgetCarusel::saveEdit($data_images, $this->page_actual->id, $this->widget_id);
        

        $this->my_widgets = WidgetBuilder::getMyWidgets($this->page_actual->id);
        self::resetWidget();
    }

    public function storePage(Request $request)
    {
        $title = $request->title;
        $data_title = array(
            'name' => $title,
            'slug' => Str::slug($title)
        );
        $builder = new Builder($data_title);
        $builder->save();
    }

    /**
     ** Actualizar el listado de paginas al dar de alta en el javacript title.js
     *
     * @return void
     */
    public function updatePages()
    {
        $this->pages = Builder::all();
        $this->emit('setTree');
    }
    
    public function updateSection($widget_id)
    {
        $get_widget   = Widget::find($widget_id);
        if ($get_widget !== null) {
            $name_section = '#widget-'.$get_widget->execute_widget;
            $this->widget = $widget_id;
            //dd($name_section);
            $this->emit('setScroll', $name_section);
        }
    }

    public function resetWidget()
    {
        $this->widget           = '';
        $this->header           = '';
        $this->header_imagen    = '';
        $this->widget_id        = null;
        $this->emit('setTree');
    }
}
