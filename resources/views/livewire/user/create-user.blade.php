<div>
    <div x-data="{show:false,edit:false,id:''}"         
    @form-show.window= "show=true;$dispatch('list-hidden')" 
    @form-hidden.window= "show=false" 
    @form-create.window="$dispatch('form-show');edit=false;id='';$wire.create();"
    @form-edit.window="$dispatch('form-show');edit=true;id=$event.detail;$wire.edit($event.detail);"
    x-transition.duration.50ms>
        <div x-show="show" x-transition.duration.50ms>

            <div  class="bg-white shadow overflow-hidden sm:rounded-lg p-5">
                <div wire:loading.flex wire:target="create, edit" class="items-center">
                    <x-spinner-loading class="h-5 w-5 text-gray-600" /> Cargando...
                </div>
                <div wire:loading.class="invisible" wire:target="create, edit">
                    <div>
                        <h3 class="text-lg font-medium leading-6 " x-text="edit ? 'Editar usuario':'Crear Usuario'">Crear
                            Usuario
                        </h3>
                    </div>
                    <form x-ref="form_create" class="mt-3" wire:submit.prevent="save">
                        <div class="divide-y divide-gray-100">
                            <div class="flex items-center py-4 ">
                                <x-form-label class="w-3/12">
                                    Nombre

                                </x-form-label>
                                <div class=" w-4/12">
                                    <x-form-input type="text" wire:model.defer="user.name">
                                    </x-form-input>
                                    @error('user.name')
                                        <span class="error error-input">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center py-4 ">
                                <x-form-label class="w-3/12">
                                    Email

                                </x-form-label>
                                <div class=" w-4/12">
                                    <x-form-input type="email" wire:model.defer="user.email">
                                    </x-form-input>
                                    @error('user.email')
                                        <span class="error error-input">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-center py-4 ">
                                <x-form-label class="w-3/12">
                                    Telefono

                                </x-form-label>
                                <div class=" w-4/12">
                                    <x-form-input type="text" wire:model.defer="user.phone">
                                    </x-form-input>
                                    @error('user.phone')
                                        <span class="error error-input">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center py-4 ">
                                <x-form-label class="w-3/12">
                                    Activo

                                </x-form-label>
                                <div class=" w-4/12">
                                    <div class="flex items-center">
                                        <div>
                                            <span>SI</span>
                                            <x-form-input type="radio" name="active" value="1"
                                                wire:model.defer="user.active">
                                            </x-form-input>
                                        </div>
                                        <div class="ml-3">
                                            <span>NO</span>
                                            <x-form-input type="radio" name="active" value="0"
                                                wire:model.defer="user.active">
                                            </x-form-input>
                                        </div>
                                    </div>
                                    @error('user.active')
                                        <span class="error error-input">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-center py-4 ">
                                <x-form-label class="w-3/12">
                                    Contraseña

                                </x-form-label>
                                <div class=" w-4/12">
                                    <x-form-input type="password" wire:model.defer="password">
                                    </x-form-input>
                                    @error('password')
                                        <span class="error error-input">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-center py-4 ">
                                <x-form-label class="w-3/12">Confirmar Contraseña</x-form-label>
                                <div class=" w-4/12">
                                    <x-form-input type="password" wire:model.defer="password_confirmation">
                                    </x-form-input>

                                </div>
                            </div>

                        </div>

                    </form>
                    <div class="text-right py-3">
                        <x-secondary-button x-on:click="$dispatch('list-show')" wire:loading.attr="disabled">
                            volver
                        </x-secondary-button>
                        <x-button x-show="!edit" class="ml-2" wire:click="save"
                            wire:loading.attr="disabled">
                            Guardar
                        </x-button>
                        <x-button x-show="edit" x-on:click="$wire.update(id)" class="ml-2"
                            wire:loading.attr="disabled"> Editar </x-button>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Modal confirmation delete-->
    <div>
        <div x-data="{
        show :@entangle('open_modal_confirmation').defer,
        id:null
    }" @open-modal-confirmation-delete.window="show = true;id=$event.detail;">

            <x-confirmation-modal>
                <x-slot name="title">
                    Borrar Usuario
                </x-slot>

                <x-slot name="content">
                    ¿Estás seguro de que deseas eliminar este usuario?
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)"
                        wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar Usuario</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>
</div>
