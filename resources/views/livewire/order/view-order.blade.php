<div>

    <x-create-data>
        <div class=" flex items-center justify-between mb-6">
            <h3 class="text-lg font-medium leading-6">Pedido #{{ $order->order }}</h3>

            @if ($order->state != 'refunded')
                <a href="#" class="font-medium text-red-600 hover:text-red-900 ml-3 " x-on:click="
            $dispatch('open-modal-confirmation-delete',{{ $order->id }})">
                    {{ $order->state != 'successful' ? 'Rembolsar' : 'Cancelar' }} orden
                </a>
            @endif
        </div>

        <div class="space-y-2 mb-6 text-sm">
            <div class="flex items-center">
                <span class="font-semibold mr-2">Nombre:</span>
                {{ $user->name }}
            </div>
            <div class="flex items-center">
                <span class="font-semibold mr-2">Telefono:</span>
                {{ $order->phone }}
            </div>
            <div class="flex items-center">
                <span class="font-semibold mr-2">Direccion:</span>
                {{ $order->address }}
            </div>
            <div class="flex items-center">
                <span class="font-semibold mr-2">Nota:</span>
                {{ $order->note ? $order->note : 'sin Nota' }}
            </div>
            <div class="flex items-center">
                <span class="font-semibold mr-2">
                    Fecha de creacion:
                </span>
                {{ $order->created_at }}
            </div>
            <div class="flex items-center">
                <span class="font-semibold mr-2">
                    Estado:
                </span>
                <div class="text-sm">
                    <x-order-state :state="$order->state" />
                </div>
            </div>
        </div>
        <div>
            <table class="w-full rounded-lg overflow-hidden table-fixed text-sm">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 text-heading font-semibold text-left">
                            Pedido
                        </th>
                        <th class="px-4 py-2 bg-gray-100 text-heading font-semibold text-left">
                            Monto
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($order->products as $product)
                        <tr>
                            <td class="px-4 py-2 text-left">
                                {{ $product->quantity }} x {{ $product->name }}
                            </td>
                            <td class="px-4 py-2 text-left">
                                {{ Helpers::format_price($product->total_price_quantity) }}
                            </td>
                        </tr>
                    @endforeach


                    <tr class="font-semibold italic bg-gray-100">
                        <td class="px-4 py-2 text-left ">Subtotal</td>
                        <td class="px-4 py-2 text-left">
                            {{ Helpers::format_price($order->sub_total) }}
                        </td>
                    </tr>

                    @if ($order->discount)
                        <tr class="font-semibold italic">
                            <td class="px-4 py-2 text-left ">Descuento</td>
                            <td class="px-4 py-2 text-left">
                                -{{ Helpers::format_price($order->discount->applied) }}
                            </td>
                        </tr>
                    @endif

                    <tr class="font-semibold italic">
                        <td class="px-4 py-2 text-left ">
                            Impuestos ({{ $order->tax_percent }}%)
                        </td>
                        <td class="px-4 py-2 text-left">
                            {{ Helpers::format_price($order->tax_amount) }}
                        </td>
                    </tr>
                    <tr class="font-semibold italic">
                        <td class="px-4 py-2 text-left ">Envio</td>
                        <td class="px-4 py-2 text-left">
                            {{ Helpers::format_price($order->shipping) }}
                        </td>
                    </tr>
                    <tr class="font-bold  text-lg bg-gray-100">
                        <td class="px-4 py-2 text-left ">Total</td>
                        <td class="px-4 py-2 text-left">
                            {{ Helpers::format_price($order->total) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="text-right py-3">

            <x-secondary-button x-on:click="$dispatch('list-show')" wire:loading.attr="disabled">
                volver
            </x-secondary-button>

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
                    Cancelar orden
                </x-slot>

                <x-slot name="content">
                    <p class="mb-2">
                        ¿Estás seguro de que deseas Cancelar esta Orden?
                    </p>
                    <div class="flex items-center">
                        <input type="checkbox" id="refund" class="mr-3 text-red-500 focus:ring-red-500 rounded"
                            wire:model.defer="refund_checkbox">
                        <label for="refund">
                            Rembolsar dinero
                            <span class="text-red-500">{{ Helpers::format_price($order->total) }}</span>
                        </label>
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id)" wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Cancelar Orden</span>
                        <span wire:loading wire:target="delete"> Cancelando... </span>
                    </x-danger-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>
</div>
