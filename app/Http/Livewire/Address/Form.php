<?php

namespace App\Http\Livewire\Address;

use App\Http\Controllers\DonorController;
use App\Traits\Modal;
use Livewire\Component;

class Form extends Component
{
    use Modal;

    public $address_id;
    public $donor_id;
    public $state = [

    ];

    public function mount($id = null)
    {
        if($id) {
            $this->donor_id = $id['donor_id'];
            $this->address_id = $id['address_id'];
        }
        if($this->address_id) {
            $this->getAddress();
        }
    }

    public function getAddress()
    {
        $donorController = new DonorController;
        $this->state = $donorController->getAddress($this->address_id);
    }

    public function update()
    {
        $donorController = new DonorController;
        $donorControllerReturn = $donorController->updateAddress($this->address_id, $this->state);

        if($donorControllerReturn['status'] == 'success') {
            $this->close();
        }
    }

    public function save()
    {
        if($this->address_id) {
            return $this->update();
        }

        $donorController = new DonorController;
        $donorControllerReturn = $donorController->createAddress($this->donor_id, $this->state);

        if($donorControllerReturn['status'] == 'success') {
            $this->close();
        }
    }

    public function render()
    {
        return view('livewire.address.form');
    }
}
