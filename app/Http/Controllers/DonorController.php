<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Donor;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class DonorController extends Controller
{
    public function index()
    {
        return Donor::query()->get();
    }

    public function create($request)
    {
        if(isset($request['birthday_date'])) {
            $request['birthday_date'] = Carbon::createFromFormat('m/d/Y', $request['birthday_date'])->format('Y-m-d');
        }

        $validatorRequest = Validator::make($request, [
            'name' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'phone' => 'required',
            'birthday_date' => 'required',
        ])->validate();

        try {
            DB::beginTransaction();
            $address = new Donor();
            $address->query()->create($validatorRequest);
            Log::log('info', 'Donor cadastrado');
            DB::commit();
            return [
                'status' => 'success'
            ];

        }catch (\Exception $exception) {
            DB::rollBack();
            return [
                'status' => 'success'
            ];
        }

    }

    public function getAddress($idAddress)
    {
        return Address::query()->findOrFail($idAddress)->toArray();
    }

    public function createAddress($donor_id, $request)
    {
        $validatorRequest = Validator::make($request, [
            'zip_code' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'complement' => 'required',
            'city' => 'required',
            'uf' => 'required',
            'country' => 'required',
        ])->validate();

        try {
            DB::beginTransaction();

            $address = new Address;
            $address = $address->query()->create($validatorRequest);
            Log::log('info', 'Endereço cadastrado');
            Donor::query()->findOrFail($donor_id)->update([
                'address_id' => $address['id']
            ]);

            DB::commit();
            return [
                'status' => 'success'
            ];
        }catch (\Exception $exception) {
            DB::rollBack();
            return [
                'status' => 'error'
            ];
        }
    }
    public function updateAddress($idAddress, $request)
    {
        $validatorRequest = Validator::make($request, [
            'zip_code' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'complement' => 'required',
            'city' => 'required',
            'uf' => 'required',
            'country' => 'required',
        ])->validate();

        try {
            $addressDB = new Address;
            $addressDB = $addressDB->query()->findOrFail($idAddress)->update($validatorRequest);

            return [
                'status' => 'success'
            ];

        }catch (\Exception $exception) {
            return [
                'status' => 'success'
            ];
        }
    }

    public function getPayment($idPayment)
    {
        return Payment::query()->findOrFail($idPayment)->toArray();
    }

    public function createPayment($donor_id, $request)
    {
        $validatorRequest = Validator::make($request, [
            'form_payment' => 'required',
            'value' => 'required',
            'number_card' => 'required_if:form_payment,credit',
            'month' => 'required_if:form_payment,credit',
            'year' => 'required_if:form_payment,credit',
            'code' => 'required_if:form_payment,credit',
            'ag' => 'required_if:form_payment,debit',
            'account' => 'required_if:form_payment,debit',
            'dg' => 'required_if:form_payment,debit',
        ])->validate();

        try {
            DB::beginTransaction();
            $address = new Payment();
            $address = $address->query()->create($validatorRequest);

            Log::log('info', 'Metodo de pagamendo cadastrado');
            Donor::query()->findOrFail($donor_id)->update([
                'payment_id' => $address['id']
            ]);
            DB::commit();
            return [
                'status' => 'success'
            ];
        }catch (\Exception $exception) {
            DB::rollBack();
            return [
                'status' => 'error'
            ];
        }
    }
    public function updatePayment($idPayment, $request)
    {
        $validatorRequest = Validator::make($request, [
            'form_payment' => 'required',
            'value' => 'required',
            'number_card' => 'required_if:form_payment,credit',
            'month' => 'required_if:form_payment,credit',
            'year' => 'required_if:form_payment,credit',
            'code' => 'required_if:form_payment,credit',
            'ag' => 'required_if:form_payment,debit',
            'account' => 'required_if:form_payment,debit',
            'dg' => 'required_if:form_payment,debit',
        ])->validate();
        try {
            DB::beginTransaction();

            $payment = new Payment();
            $address = $payment->query()->findOrFail($idPayment)->update($validatorRequest);

            DB::commit();
            return [
                'status' => 'success'
            ];
        }catch(\Exception $exception) {
            return [
                'status' => 'error'
            ];
        }
    }
}
