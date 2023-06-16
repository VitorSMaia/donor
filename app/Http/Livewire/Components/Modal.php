<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    public $listeners = [
        'openModalCenter' => 'open',
        'closeModalCenter' => 'close',
    ];

    public $idParameter;
    public $component;
    public $show = false;


    public function open($component = null, $id = null)
    {
        $this->component = $component;
        $this->idParameter = $id;
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
        $this->idParameter = null;
        $this->component = false;
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}
