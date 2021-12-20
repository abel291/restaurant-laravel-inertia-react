<?php

namespace App\Http\Livewire\Promo;

use App\Http\Traits\WithSorting;
use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class ListPromo extends Component
{
    use WithPagination;
    use WithSorting;

    protected $listeners = [
        'renderListPromo' => 'render',
        'resetListPromo' => 'resetList'
    ];

    public function render()
    {
        $fields = ['Titulo', 'Ultimo acceso','Activo'];

        $data = Promo::where('title', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return view('livewire.promo.list-promo',compact('data','fields'));
    }
}
