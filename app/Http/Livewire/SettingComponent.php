<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class SettingComponent extends Component
{
    public $data;

    protected $listeners = [
        'store'
    ];

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting !== null) {
            $this->data = $setting->toArray();
        }
    }

    public function render()
    {
        return view('livewire.setting-component');
    }

    public function store()
    {
        Setting::saveEdit($this->data);
    }
}
