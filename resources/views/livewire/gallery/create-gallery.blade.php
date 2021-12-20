<div>
    <x-create-data>
        <div>
            <h3 class="text-lg font-medium leading-6 " x-text="(edit ? 'Editar':'Crear') +' Galeria'"></h3>
        </div>
        <form x-ref="form_create" class="mt-3" wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-5">
                    <x-form-label class="block">Nombre</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="gallery.name" />
                    @error('gallery.name')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-5">
                    <x-form-label class="block">Slug</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="gallery.slug" />
                    @error('gallery.slug')<span class="error error-input">{{ $message }}</span>@enderror
                </div>


                <div class="col-span-10">
                    <x-form-label class="block">Pequeña Descripción</x-form-label>
                    <x-form-textarea wire:model.defer="gallery.description" rows="5">
                    </x-form-textarea>
                    @error('gallery.description')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Activo</x-form-label>
                    <div>
                        <x-form-active model='gallery.active' />
                        @error('gallery.active')<span class="error error-input">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-span-12">
                    <x-form-label class="block">Imagenes</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$images" :multiple="true" name="images" :saved="$gallery->images" />
                        @error('images')
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
                    Borrar Registro
                </x-slot>

                <x-slot name="content">
                    ¿Estás seguro de que deseas eliminar esta Registro?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)"
                        wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar Registro</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>

    

</div>
