<?php

namespace App\Http\Livewire\Gallery;

use App\Helpers\Helpers;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateGallery extends Component
{

    use WithFileUploads;
    public Gallery $gallery;
    public $open_modal_confirmation = false;
    public $images = [];
    protected $rules = [
        'gallery.name' => 'required|string|max:255',
        'gallery.slug' => 'required|string|max:255',
        'gallery.description' => 'required|string',
        'gallery.active' => 'required|boolean',
        'images.*' => 'nullable|image|max:1024|mimes:jpeg,jpg,png',

    ];
    protected $path = 'galleries';

    public function mount()
    {
        $this->gallery = new Gallery();
    }
    public function create()
    {
        $this->gallery = new Gallery();
        $this->gallery = Gallery::factory()->make();
        $this->reset('images');
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->rules['images.*'] = "required|image|max:2048|mimes:jpeg,jpg,png";
        $this->validate();
        $gallery = $this->gallery;
        $gallery->slug = Str::slug($gallery->slug);
        $gallery->save();

        if ($this->images) {
            $path_name = $this->path . '/' . $gallery->slug;
            $name_images =  Helpers::images_store($this->images, $path_name);
            $gallery->images()->createMany($name_images);
        }

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
            'subtitle' => "La Registro  <b>" . $this->gallery->name . "</b>  a sido  Agregado correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->reset('images');
        $this->emit('resetListGallery');
        $this->gallery = new Gallery();
    }
    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        $this->gallery = $gallery;
        $this->reset('images');
        $this->resetErrorBag();
    }
    public function update(Gallery $gallery)
    {
        $this->validate();
        $gallery = $this->gallery;
        $gallery->slug = Str::slug($gallery->slug);
        $gallery->save();

        if ($this->images) {
            $path_name = $this->path . '/' . $gallery->slug;
            $name_images =  Helpers::images_store($this->images, $path_name, true);
            $gallery->images()->createMany($name_images);
        }

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
            'subtitle' => "El Registro  <b>" . $this->gallery->name . "</b>  a sido  Editado correctamente"
        ]);
        $this->reset('images');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('list-show');
        $this->emit('resetListGallery');

        $this->gallery = new Gallery();
    }

    public function updatedImages()
    {

        $this->validate([
            'images.*' => 'image|max:2048|mimes:jpeg,jpg,png',
        ]);
    }
    public function remove_img(Image $image)
    {

        //Storage::delete($image->img);

        //$image->delete();

        $this->gallery->images = $this->gallery->images()->get();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Imagen eliminada",
            'subtitle' => ""
        ]);
    }
    public function delete(Gallery $gallery)
    {
        $gallery->load('images');
        //Helpers::delete_images_all($gallery);
        $gallery->images()->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Eliminado",
            'subtitle' => "El Registro  <b>" . $this->gallery->name . "</b>  a sido  Eliminado correctamente"
        ]);

        $gallery->delete();
        $this->emit('resetListGallery');
        $this->open_modal_confirmation = false;
    }

    public function render()
    {
        return view('livewire.gallery.create-gallery');
    }
}
