<div>
    {{-- name
portion_size
calories
allergies
slug
description_min
stars
max_quantity
price
type
active
stock --}}
    <x-create-data>
        <div>
            <h3 class="text-lg font-medium leading-6 " x-text="(edit ? 'Editar':'Crear') +' Producto'"></h3>
        </div>
        <form x-ref="form_create" class="mt-3" wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-6">
                    <x-form-label class="block">Nombre</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="product.name" />
                    @error('product.name')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Slug</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="product.slug" />
                    @error('product.slug')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Precio</x-form-label>
                    <x-form-input class="w-full" type="number" wire:model.defer="product.price" />
                    @error('product.price')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Stock</x-form-label>
                    <x-form-input class="w-full" type="number" wire:model.defer="product.stock" />
                    @error('product.stock')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Categorias</x-form-label>
                    <x-form-select name="menu" wire:model.defer="category_id">
                        <option selected>Selecione Categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-form-select>
                    @error('category_id')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-3">
                    <x-form-label class="block">Activo</x-form-label>
                    <x-form-active model='product.active'/>
                    @error('product.active')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Tamañode porcion</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="product.portion_size" />
                    @error('product.portion_size')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-3">
                    <x-form-label class="block">Calorias</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="product.calories" />
                    @error('product.calories')<span class="error error-input">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-6">
                    <x-form-label class="block">Alergias</x-form-label>
                    <x-form-input class="w-full" type="text" wire:model.defer="product.allergies" />
                    @error('product.allergies')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-12">
                    <x-form-label class="block">Pequeña Descripción</x-form-label>
                    <x-form-textarea wire:model.defer="product.description_min" class="mt-2" rows="5">
                    </x-form-textarea>
                    @error('product.description_min')<span class="error error-input">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Imagen Principal</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$img" :multiple="false" name="img" :saved="$product->img" />
                        @error('img')
                            <span class="error error-input">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Banner</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$banner" :multiple="false" name="banner" :saved="$product->banner" />
                        @error('banner')
                            <span class="error error-input">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-span-12">
                    <x-form-label class="block">Imagenes</x-form-label>
                    <div class="mt-2">
                        <x-form-input-file :temp="$images" :multiple="true" name="images" :saved="$product->images" />
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
                    Borrar Producto
                </x-slot>

                <x-slot name="content">
                    ¿Estás seguro de que deseas eliminar esta Producto?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)"
                        wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar Producto</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>
</div>
