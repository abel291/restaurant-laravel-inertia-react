@props(['textButton', 'data', 'fields'])


<div x-data="{show:true}" @list-show.window="show=true;$dispatch('form-hidden')" @list-hidden.window="show=false">

    <div x-show="show" x-transition.duration.50ms class="flex flex-col">
        <div class="flex justify-between mb-2">
            <div class="flex  items-center">
                <x-form-input type="text" wire:model.debounce.500ms="search" class="mr-4 text-sm"
                    placeholder="Buscador">
                </x-form-input>
                <div wire:loading wire:target="search">
                    <x-spinner-loading class="h-6 w-6 text-gray-400" />

                </div>
            </div>
            @if ($textButton)
                <x-button x-on:click="$dispatch('form-create')">
                    {{ $textButton }}
                </x-button>
            @endif

        </div>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" wire:click="sortBy('id')"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            ID

                        </th>
                        @foreach ($fields as $field)
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $field }}
                            </th>
                        @endforeach
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($data->isNotEmpty())
                        {{ $table_data }}
                    @else
                        <tr>
                            <td colspan="20" class="px-6 py-3  text-center">No hay registros</td>
                        </tr>
                    @endif
                </tbody>
            </table>


        </div>
        <div class="mt-2">
            {{ $data->links() }}
        </div>
    </div>
</div>
