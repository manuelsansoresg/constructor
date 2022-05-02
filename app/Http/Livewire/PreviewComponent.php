<?php

namespace App\Http\Livewire;

use App\Models\Builder;
use App\Models\WidgetBuilder;
use Livewire\Component;

class PreviewComponent extends Component
{
    public $page;
    public $page_actual;
    public $my_widgets;

    protected $listeners = [
        'updatePreview'
    ];

    public function mount($page)
    {
        $this->page = $page;
        if ($page == null) {
            $this->page = 'Inicio';
        }
        $this->page_actual = Builder::where('name', $this->page)->first();
        $this->my_widgets  = WidgetBuilder::getMyWidgets($this->page_actual->id);
    }

    public function render()
    {
        return view('livewire.preview-component');
    }

   
}
