<?php

namespace App\Http\Livewire\DiscountCode;

use App\Http\Traits\WithSorting;
use App\Models\DiscountCode;
use Livewire\Component;
use Livewire\WithPagination;

class ListDiscountCode extends Component
{
    use WithPagination;
    use WithSorting;

    protected $listeners = [
        'renderListDiscountCode' => 'render',
        'resetListDiscountCode' => 'resetList'
    ];

    public function render()
    {
        $fields = ['Nombre - Descripcion',  'Codigo', 'Tipo - Valor', ' Ultimo acceso', 'Activo'];

        $data = DiscountCode::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return view('livewire.discount-code.list-discount-code',compact('data','fields'));
    }
}
