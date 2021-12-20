<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Promociones') }}
        </h2>
    </x-slot>
    <div>

        <x-list-data text-button='Agregar Promocion' :data="$data" :fields="$fields">
            <x-slot name="table_data">
                @foreach ($data as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm font-medium">
                            {{ $item->id }}
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                            <div>
                                {{ $item->title }}
                            </div>
                            <div>
                                {{ $item->sub_title }}
                            </div>
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->updated_at }}
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap ">
                            <x-active-item :active="$item->active" />
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <button class="font-medium text-indigo-600 hover:text-indigo-900"
                                x-on:click="$dispatch('form-edit',{{ $item->id }})">Edit</button>

                            <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-on:click="
                            $dispatch('open-modal-confirmation-delete',{{ $item->id }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>

        </x-list-data>

        @livewire('promo.create-promo')
    </div>

</div>
