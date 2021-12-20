
<div x-data="{show:false,edit:false,id:''}" @form-show.window="show=true;$dispatch('list-hidden')"
    @form-hidden.window="show=false" @form-create.window="$dispatch('form-show');edit=false;id='';$wire.create()"
    @form-edit.window="$dispatch('form-show');edit=true;id=$event.detail;$wire.edit($event.detail)"
    x-transition.duration.50ms>
    <div x-show="show" x-transition.duration.50ms>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-5">
            <div wire:loading.flex wire:target="create, edit" class="items-center">
                <x-spinner-loading class="h-5 w-5 text-gray-600" /> Cargando...
            </div>
            <div wire:loading.class="invisible" wire:target="create, edit">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
