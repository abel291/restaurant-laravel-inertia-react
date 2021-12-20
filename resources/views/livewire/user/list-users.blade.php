<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div>

        <x-list-data text-button='Agregar Usuario' :data="$data" :fields="$fields">
            <x-slot name="table_data">
                @foreach ($data as $user)
                    <tr>
                        <td class="px-6 py-3 text-sm font-medium">
                            {{ $user->id }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">

                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $user->email }}
                            </div>

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">

                            <div class="text-sm text-gray-500">
                                {{ $user->phone }}
                            </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap ">
                            <div class="text-sm text-gray-500">
                                {{ $user->updated_at }}
                            </div>

                        </td>
                        <td class="px-6 py-3 whitespace-nowrap ">
                            @if ($user->active)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Desactive
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <button class="font-medium text-indigo-600 hover:text-indigo-900"
                                x-on:click="$dispatch('form-edit',{{ $user->id }})">Edit</button>

                            <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-on:click="
                            $dispatch('open-modal-confirmation-delete',{{ $user->id }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>

        </x-list-data>

        @livewire('user.create-user')
    </div>




</div>
