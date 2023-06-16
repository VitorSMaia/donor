<div>
    <form wire:submit.prevent="save" class="grid grid-cols-2 gap-6 ">
        <x-input-text type="text" wire:model.defer="state.value" model="value" label="Valor"/>
        <x-select wire:model="state.form_payment" model="form_payment" label="Forma de pagamento">
            <option value="">Selecione</option>
            <option value="credit">Credito</option>
            <option value="debit">Debito</option>
        </x-select>

        @if($state['form_payment'] === 'credit')
        <x-input-text x-mask="9999 9999 9999 9999"  wire:model.defer="state.number_card" model="number_card" label="NUmero Cartao"/>
        <x-input-text x-mask="99"  wire:model.defer="state.month" model="month" label="Mes"/>
        <x-input-text x-mask="9999"  wire:model.defer="state.year" model="year" label="Ano"/>
        <x-input-text x-mask="999"  wire:model.defer="state.code" model="code" label="CVV"/>
        @elseif($state['form_payment'] === 'debit')
            <x-input-text x-mask="9999"  wire:model.defer="state.ag" model="ag" label="Agencia"/>
            <x-input-text x-mask="99999"  wire:model.defer="state.account" model="account" label="Conta"/>
            <x-input-text x-mask="99"  wire:model.defer="state.dg" model="dg" label="Digito"/>
        @endif
        <div class="col-span-2">
            <button type="submit" class="w-full rounded-md font-extralight text-white bg-black p-2">Salvar</button>
        </div>
    </form>
</div>
