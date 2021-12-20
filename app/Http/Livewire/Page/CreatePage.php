<?php

namespace App\Http\Livewire\Page;

use App\Helpers\Helpers;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreatePage extends Component
{
    use WithFileUploads;
    public Page $page;
    public $open_modal_confirmation = false;

    public $banner;
    

    protected $rules = [
        'page.title' => 'required|string|max:255',
        'page.options.*' => 'nullable',
        'banner' => 'nullable|image|max:1024|mimes:jpeg,jpg,png',
        'options.*' => 'nullable',
    ];

    public function mount()
    {
        $this->page = new Page();
    }
    public function edit(Page $page)
    {

        $this->page = $page;

        $this->reset('banner');
        $this->resetErrorBag();
    }
    public function update(Page $page)
    {
        $this->validate();
        $page = $this->page;
        $page->save();

        if ($this->banner) {
            //Storage::delete($page->banner);
            $page->banner = $page->type . '/' . $page->slug . '-banner'  . '.' . $this->banner->extension();
            Helpers::image_upload($this->banner, $page->banner);
        }

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
            'subtitle' => "El Registro  <b>" . $this->page->name . "</b>  a sido  Editado correctamente"
        ]);
        $this->reset('banner');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('list-show');
        $this->emit('resetLisPage');
        $this->page = new Page();
    }

    public function updatedBanner()
    {
        $this->validate([
            'banner' => 'image|max:2048|mimes:jpeg,jpg,png'
        ]);
    }

    public function render()
    {
        return view('livewire.page.create-page');
    }
}
