<div>

    <x-create-data>
        <div>
            <h3 class="text-lg font-medium leading-6 " x-text="(edit ? 'Editar':'Crear') +' Producto'"></h3>
        </div>
        <form x-ref="form_create" class="mt-3" wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-6">
                    <x-form-label class="block">Nombre</x-form-label>
                    <x-form-input class="w-full mt-2" type="text" wire:model.defer="discount_code.name" />
                    @error('discount_code.name')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-8">
                    <x-form-label class="block">Pequeña Descripcion</x-form-label>
                    <x-form-input class="w-full mt-2" type="text" wire:model.defer="discount_code.description" />
                    @error('discount_code.description')<span
                        class="error error-input">{{ $message }}</span>@enderror
                </div>

                

                <div class="col-span-3">
                    <x-form-label class="block">Codigo</x-form-label>
                    <x-form-input class="w-full mt-2 uppercase" type="text" wire:model.defer="discount_code.code" />
                    @error('discount_code.code')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-3">
                    <x-form-label class="block">Tipo</x-form-label>
                    <x-form-select name="menu" wire:model.defer="discount_code.type">
                        <option selected>Selecione Tipo de valor</option>
                        <option value="percent">Porcentaje</option>
                        <option value="amount">Monto</option>
                    </x-form-select>
                    @error('category_id')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-3">
                    <x-form-label class="block">Valor</x-form-label>
                    <x-form-input class="w-full mt-2" type="number" min="0" wire:model.defer="discount_code.value" />
                    @error('discount_code.value')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Stock</x-form-label>
                    <x-form-input class="w-full mt-2" type="number" min="0" wire:model.defer="discount_code.stock" />
                    @error('discount_code.stock')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Activo</x-form-label>
                    <div>
                        <x-form-active model='discount_code.active' />
                        @error('discount_code.active')
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
