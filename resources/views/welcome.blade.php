@extends('layouts.app')
@section('content')
    <div class="mt-10 p-5 flex justify-between items-center">
        Listagem de doações
        <div>
            @livewire('components.button', ['Cadastrar','donor.form'])
        </div>
    </div>
    <div class="p-5">
        @livewire('donor.table')
    </div>
@endsection
