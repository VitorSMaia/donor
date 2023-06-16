<?php

namespace App\Traits;
trait Modal
{
    public function open($component = null, $params = [])
    {
        $this->emit('openModalCenter', $component, $params);
    }

    public function close()
    {
        $this->emit('closeModalCenter');
    }
}
