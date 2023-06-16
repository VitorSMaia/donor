<?php

namespace App\Http\Livewire\Donor;

use App\Http\Controllers\DonorController;
use App\Traits\Modal;
use Livewire\Component;

class Table extends Component
{
    use Modal;
    public $donors;
    protected $listeners = [
        'refreshTableDonor' => '$refresh'
    ];


    public function getDonor()
    {
        $donorController = new DonorController;
        $this->donors = $donorController->index();
    }

    public function render()
    {
        $this->getDonor();
        return view('livewire.donor.table');
    }
}
