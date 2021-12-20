<?php

namespace App\Http\Livewire\Gallery;

use App\Http\Traits\WithSorting;
use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class ListGallery extends Component
{
    use WithPagination;
    use WithSorting;

    protected $listeners = [
        'renderListGallery' => 'render',
        'resetListGallery' => 'resetList'
    ];

    public function render()
    {
        $fields = ['Nombre - Slug',  'Banner', 'Ultimo acceso','activo'];

        $data = Gallery::where('name', 'like', '%' . $this->search . '%')
            ->with('images')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return view('livewire.gallery.list-gallery', compact('data', 'fields'));
    }
}
