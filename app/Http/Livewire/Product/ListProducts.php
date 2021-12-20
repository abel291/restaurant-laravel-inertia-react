<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Http\Traits\WithSorting;
use App\Models\Product;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;
    use WithSorting ;

    protected $listeners = [
        'renderListProducts' => 'render',
        'resetListProducts' => 'resetList'
    ];
    
        public function render()
    {
        $fields = ['Nombre - Categoria',  'Precio', 'Imagen', ' Ultimo acceso', 'Activo'];

        $data = Product::where('name', 'like', '%' . $this->search . '%')
            ->with('category')
            ->whereDoesntHave('category' , function ($query) {
                $query->where('type','=', 'gift_card');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        

        return view('livewire.product.list-products', compact('data', 'fields'));
    }
}
//crear Promociones