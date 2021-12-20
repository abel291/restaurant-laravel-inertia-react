<div>

    <x-create-data>
        <div>
            <h3 class="text-lg font-medium leading-6 " x-text="(edit ? 'Editar':'Crear') +' Producto'"></h3>
        </div>
        <form x-ref="form_create" class="mt-3" wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-3">
                    <x-form-label class="block">Precio</x-form-label>
                    <x-form-input class="w-full mt-2" type="number" wire:model.defer="gift_card.price" />
                    @error('gift_card.price')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Stock</x-form-label>
                    <x-form-input class="w-full mt-2" type="number" wire:model.defer="gift_card.stock" />
                    @error('gift_card.price')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-3">
                    <x-form-label class="block">Activo</x-form-label>
                    <div>
                        <x-form-active model='gift_card.active' />
                        @error('gift_card.active')
                            <span class="error error-input">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="col-span-12">
                    <x-form-label class="block">Pequeña Descripcion</x-form-label>
                    <div>
                        <x-form-textarea wire:model.defer="gift_card.description_min" class="mt-2" rows="5">
                        </x-form-textarea>
                        @error('gift_card.description_min')<span
                            class="error error-input">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Imagen Principal</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$img" :multiple="false" name="img" :saved="$gift_card->img" />
                        @error('img')
                            <span class="error error-input">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Banner</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$banner" :multiple="false" name="banner"
                            :saved="$gift_card->banner" />
                        @error('banner')
                            <span class="error error-input">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>


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

    <!--Modal confirmation delete-->
    <div>
        <div x-data="{
            show :@entangle('open_modal_confirmation').defer,
            id:null
        }" @open-modal-confirmation-delete.window="show = true;id=$event.detail;">

            <x-confirmation-modal>
                <x-slot name="title">
                    Borrar Targeta
                </x-slot>

                <x-slot name="content">
                    ¿Estás seguro de que deseas eliminar esta Targeta?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)"
                        wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar Targeta</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>
</div>
