<div>
    <form wire:submit.prevent="save" class="grid grid-cols-2 gap-6 ">
        <x-input-text wire:model.defer="state.name" model="name" label="Nome"/>
        <x-input-text type="email" wire:model.defer="state.email" model="email" label="Email"/>
        <x-input-text x-mask="999.999.999-99"  wire:model.defer="state.cpf" model="cpf" label="CPF"/>
        <x-input-text x-mask="(99) 9 9999-9999"  wire:model.defer="state.phone" model="phone" label="Telefone"/>
        <x-input-text x-mask="99/99/9999"  wire:model.defer="state.birthday_date" model="birthday_date" label="Data Anivesário"/>

        <div class="col-span-2">
            <button type="submit" class="w-full rounded-md font-extralight text-white bg-black p-2">Salvar</button>
        </div>
    </form>
</div>
