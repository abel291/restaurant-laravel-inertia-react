<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ViewOrder extends Component
{

    public Order $order;
    public User $user;
    public $open_modal_confirmation = false;
    public $refund_checkbox = false;
    public function mount()
    {
        $this->order = new Order();
        $this->user = new User();
    }
    public function edit(Order $order)
    {
        $order->load('user');
        $this->user = $order->user;
        $this->order = $order;
    }
    public function delete(Order $order)
    {

        $order->state = $this->refund_checkbox ? 'refunded' : 'canceled';
        $order->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Orden Cancelada",
            'subtitle' => "La Orden  <b>" . $this->order->order . "</b>  a sido  cancelada correctamente"
        ]);
        $this->emit('resetListOrder');
        $this->open_modal_confirmation = false;
        $this->dispatchBrowserEvent('list-show');
    }
    public function render()
    {
        return view('livewire.order.view-order');
    }
}
