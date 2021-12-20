<?php

namespace App\Http\Livewire\Page;

use App\Http\Traits\WithSorting;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class ListPage extends Component
{
    use WithPagination;
    use WithSorting;

    protected $listeners = [
        'renderListPage' => 'render',
        'resetListPage' => 'resetList'
    ];

    public function render()
    {
        $fields = ['Nombre - Tipo',  'Banner', 'Ultimo acceso', ];

        $data = Page::where('title', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return view('livewire.page.list-page',compact('data','fields'));
    }
}
