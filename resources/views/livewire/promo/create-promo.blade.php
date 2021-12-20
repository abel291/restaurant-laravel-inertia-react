<div>

    <x-create-data>
        <div>
            <h3 class="text-lg font-medium leading-6 " x-text="(edit ? 'Editar':'Crear') +' Promocion'"></h3>
        </div>
        <form x-ref="form_create" class="mt-3" wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-6">

                <div class="col-span-6">
                    <x-form-label class="block">Titulo</x-form-label>
                    <div>
                        <x-form-input class="w-full" type="text" wire:model.defer="promo.title" />
                        <x-form-input-error for="promo.title"  />
                    </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Subtitulo</x-form-label>
                    <div>
                        <x-form-input class="w-full" type="text" wire:model.defer="promo.sub_title" />
                        <x-form-input-error for="promo.sub_title"  />
                    </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Producto</x-form-label>
                        <div>
                            <x-form-select name="menu" wire:model.defer="product_id">
                                <option selected>Seleccione el producto</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                        @foreach ($category->products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </x-form-select>
                            <x-form-input-error for="product_id"  />
                        </div>
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Fecha de Inicio</x-form-label>
                        <div>
                            <x-form-input-date ref="start_date" :date="$this->promo->start_date" class="w-full"
                                wire:model.defer="promo.start_date" />

                            <x-form-input-error for="promo.start_date"  />
                        </div>
                </div>

                <div class="col-span-3">
                    <x-form-label class="block">Fecha final</x-form-label>
                        <div>
                            <x-form-input-date ref="end_date" :date="$this->promo->end_date" class="w-full"
                                wire:model.defer="promo.end_date" />
                            <x-form-input-error for="promo.end_date"  />

                        </div>
                </div>

                <div class="col-span-6">
                    <x-form-label class="block">Paginas</x-form-label>
                    <div class="grid grid-cols-4 gap-2 ">
                        @foreach ($pages as $index => $page)
                            <div class="flex items-center">
                                <x-form-input id="{{ $page->type }}" name="pages" type="checkbox"
                                    value="{{ $page->id }}" wire:model.defer="pages_selected.{{ $page->id }}" />
                                <label class="text-sm ml-2" for="{{ $page->type }}">{{ $page->type }}</label>
                            </div>
                        @endforeach

                    </div>
                    <x-form-input-error for="promo.sub_title"  />
                </div>
                <div class="col-span-3">
                    <x-form-label class="block">Activo</x-form-label>
                    <div>
                        <x-form-active model='promo.active' />
                        <x-form-input-error for="promo.active"  />

                    </div>

                </div>

                <div class="col-span-12 ">
                    <x-form-label class="block">Imagen</x-form-label>
                    <div >
                        <x-form-input-file :temp="$img" :multiple="false" name="img" :saved="$promo->img" />
                        <x-form-input-error for="img"  />
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
                    Borrar registro
                </x-slot>

                <x-slot name="content">
                    ¿Estás seguro de que deseas eliminar esta registro?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)"
                        wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar registro</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>
</div>
