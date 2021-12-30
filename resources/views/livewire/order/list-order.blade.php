<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Ordenes') }}
        </h2>
    </x-slot>
    <div>

        <x-list-data text-button='' :data="$data" :fields="$fields">
            <x-slot name="table_data">
                @foreach ($data as $item)
                    <tr>
                        <td class="px-6 py-3 text-sm font-medium">
                            {{ $item->id }}
                        </td>
                        <td class="px-6 py-3 text-sm font-medium">
                            #{{ $item->order }}
                        </td>

                        <td class="px-6 py-3 text-sm text-gray-500">
                            {{ $item->user->name }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                            {{ Helpers::format_price($item->total) }}
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-xs text-gray-500">
                            <x-order-state :state="$item->state" />
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->updated_at }}
                        </td>

                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <button class="font-medium text-indigo-600 hover:text-indigo-900"
                                x-on:click="$dispatch('form-edit',{{ $item->id }})">Ver</button>


                        </td>

                    </tr>
                @endforeach
            </x-slot>

        </x-list-data>

        @livewire('order.view-order')
    </div>

</div>
