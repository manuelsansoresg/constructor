<?php

namespace App\Http\Livewire;

use App\Models\Builder;
use App\Models\Section;
use App\Models\Widget;
use App\Models\WidgetBuilder;
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
    public $header;
    public $header_imagen;
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
        $this->page_actual = Builder::where('name', 'Inicio')->first();
        $this->pages = Builder::all();
        $this->widgets = Widget::all();

        $this->my_widgets = WidgetBuilder::getMyWidgets($this->page_actual->id);
    }

    public function render()
    {
        return view('livewire.constructor-component');
    }

    public function setPage($page)
    {
        $this->page_actual = $page;
    }

    public function resetWidget()
    {
        $this->widget = '';
    }

    public function deleteWidget($widget_id, $type)
    {
        $data_widget_builder = array(
            'builder_id' => $this->page_actual->id,
            'id_rel' => $type,
            'widget_id' => $widget_id
        );
        
        WidgetBuilder::where($data_widget_builder)->delete();
        WidgetHeader::find($widget_id)->delete();
        self::resetWidget();
    }

    public function storeHeader()
    {
        $this->validate(WidgetHeader::rules());
        $this->header['widget_id'] = $this->widget;
        if ($this->header_imagen != null) {
            /* $imagen_anterior = $this->header_imagen;
            @unlink('storage/'.$imagen_anterior); */
            $file           = $this->header_imagen->store('files', 'public');
            $this->header['imagen']   = $file;
        }
        WidgetHeader::saveEdit($this->header, $this->page_actual->id);
        Artisan::call('storage:link');
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
        
        $this->widget = $widget_id;

        $widgets = array(
            '' => '',
            1 => '#widget-header'
        );
        $this->emit('setScroll', $widgets[$widget_id]);
    }
}
