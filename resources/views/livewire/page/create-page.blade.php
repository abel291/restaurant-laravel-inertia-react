<div>
    <x-create-data>

        <form x-ref="form_create" class="" wire:submit.prevent="save">
            <h3 class="text-lg font-medium leading-6 " x-text="(edit ? 'Editar':'Crear') +' Datos generales'"></h3>
            <div class="grid grid-cols-12 gap-6 mt-3">

                <div class="col-span-6">
                    <x-form-label class="block">Titulo</x-form-label>
                    <div>
                        <x-form-input class="w-full" type="text" wire:model.defer="page.title" />
                        @error('page.title')<span class="error error-input">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Banner</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$banner" :multiple="false" name="banner" :saved="$page->banner" />
                        @error('banner')<span class="error error-input">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>
            {{-- @if ($page->type = 'home')
                <div class="mt-10">
                    <x-page.home-promo :promos="$promos" :page="$page->promos" />
                </div>
            @endif --}}
        </form>

        <div class="text-right py-3">
            <x-secondary-button x-on:click="$dispatch('list-show')" wire:loading.attr="disabled">
                volver
            </x-secondary-button>
            <x-button x-show="!edit" class="ml-2" wire:click="save" wire:loading.attr="disabled">
                Guardar
            </x-button>
            <x-button x-show="edit" x-on:click="$wire.update(id)" class="ml-2"
                wire:loading.attr="disabled">
                Editar
            </x-button>

        </div>
    </x-create-data>
</div>

<!--
AGREGAR 'NAME' A LA TABLA PAGE
-->
