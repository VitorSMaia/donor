<div>
    <form wire:submit.prevent="save" class="grid grid-cols-2 gap-6 ">

        <x-input-text wire:model.defer="state.zip_code" model="zip_code" label="CEP"/>
        <x-input-text wire:model.defer="state.street" model="street" label="Rua"/>
        <x-input-text wire:model.defer="state.number" model="number" label="Numero"/>
        <x-input-text wire:model.defer="state.neighborhood" model="neighborhood" label="Bairro"/>
        <x-input-text wire:model.defer="state.complement" model="complement" label="Complemento"/>
        <x-input-text wire:model.defer="state.city" model="city" label="Cidade"/>
        <x-input-text wire:model.defer="state.uf" model="uf" label="Estado"/>
        <x-input-text wire:model.defer="state.country" model="country" label="Pais"/>

        <div class="col-span-2">
            <button type="submit" class="w-full rounded-md font-extralight text-white bg-black p-2">Salvar</button>
        </div>
    </form>
</div>
