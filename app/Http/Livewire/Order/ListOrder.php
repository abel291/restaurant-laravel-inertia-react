<?php

namespace App\Http\Livewire\Order;

use App\Http\Traits\WithSorting;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ListOrder extends Component
{
    use WithPagination;
    use WithSorting;

    protected $listeners = [
        'renderListOrder' => 'render',
        'resetListOrder' => 'resetList'
    ];

    public function render()
    {
        $fields = ['order', 'Cliente', 'Total', 'Estado', 'Fecha de Creacion'];

        $data = Order::where('order', 'like', '%' . $this->search . '%')
            ->with('user')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        //dd($data);
        return view('livewire.order.list-order', compact('data', 'fields'));
    }
}
