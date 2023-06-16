<?php

namespace App\Http\Livewire\Payment;

use App\Http\Controllers\DonorController;
use App\Traits\Modal;
use Livewire\Component;

class Form extends Component
{
    use Modal;
    public $payment_id;
    public $state = [
        'form_payment' => ''
    ];

    public function mount($id = null)
    {
        if($id) {
            $this->donor_id = $id['donor_id'];
            $this->payment_id = $id['payment_id'];
        }
        if($this->payment_id) {
            $this->getPayment();
        }
    }

    public function getPayment()
    {
        $donorController = new DonorController;
        $this->state = $donorController->getPayment($this->payment_id);
    }
    public function updateStateFormPayment()
    {
//        $donorController = new DonorController;
//        $donorController->updatePayment($this->payment_id, $this->state);
    }

    public function update()
    {
        $donorController = new DonorController;
        $donorControllerReturn = $donorController->updatePayment($this->payment_id, $this->state);

        if($donorControllerReturn['status'] == 'success') {
            $this->close();
        }
    }

    public function save()
    {
        if ($this->payment_id) {
            return $this->update();
        }
        $donorController = new DonorController;
        $donorControllerReturn = $donorController->createPayment($this->donor_id, $this->state);

        if($donorControllerReturn['status'] == 'success') {
            $this->close();
        }
    }

    public function render()
    {
        return view('livewire.payment.form');
    }
}
