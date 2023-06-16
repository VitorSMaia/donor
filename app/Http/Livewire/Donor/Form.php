<?php

namespace App\Http\Livewire\Donor;

use App\Http\Controllers\DonorController;
use App\Traits\Modal;
use Livewire\Component;

class Form extends Component
{
    use Modal;
    public $state = [
        'name' => 'Vitor',
        'email' => 'vitor@gmail.com',
        'cpf' => '06972728347',
        'birthday_date' => '06/06/2000',
        'phone' => '(11) 9 1356-4982',
    ];

    public function save()
    {
        $donorController = new DonorController;
        $donorController->create($this->state);
        $this->close();
        $this->emit('refreshTableDonor');
    }
    public function render()
    {
        return view('livewire.donor.form');
    }
}
