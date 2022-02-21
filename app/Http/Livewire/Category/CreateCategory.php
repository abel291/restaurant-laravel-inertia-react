<?php

namespace App\Http\Livewire\Category;

use App\Helpers\Helpers;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateCategory extends Component
{
    use WithFileUploads;
    public Category $category;
    public $open_modal_confirmation = false;
    public $img;
    protected $rules = [
        'category.name' => 'required|string|max:255',
        'category.slug' => 'required|string|max:255',
        'category.active' => 'required|boolean',
        'img' => 'image|max:2048|mimes:jpeg,jpg,png',
    ];
    protected $path = 'categories';

    //

    public function mount()
    {
        $this->category = new Category();
    }
    public function create()
    {
        $this->category = new Category();
        $this->reset('img');
        $this->resetErrorBag();
    }
    public function save()
    {
        //dd($this->img);
        $this->rules['img'] = "required|image|max:2048|mimes:jpeg,jpg,png";
        $this->validate();
        $category = $this->category;
        $category->slug = Str::slug($category->slug);
        $category->img = $this->path . '/' . $category->slug . '-img'  . '.' . $this->img->extension();
        $category->save();

        Helpers::image_upload($this->img, $category->img, true);

        $this->dispatchBrowserEvent('notification', [
            'title' => "Categoria Agregada",
            'subtitle' => "La categoria  <b>" . $this->category->name . "</b>  a sido  Agregado correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->reset('img');
        $this->emit('resetListCategories');
        $this->category = new Category();
    }

    public function edit(Category $category)
    {

        $this->category = $category;
        $this->reset('img');
        $this->resetErrorBag();
    }
    public function update()
    {
        $this->rules['img'] = "nullable|image|max:2048|mimes:jpeg,jpg,png";
        $this->validate();
        $category = $this->category;
        $category->slug = Str::slug($category->slug);

        if ($this->img) {
            //Storage::delete('thumbnail/' . $category->img);
            //Storage::delete($category->img);
            $category->img = $this->path . '/' . $category->slug . '-img'  . '.' . $this->img->extension();
            Helpers::image_upload($this->img, $category->img, true);
        }
        $category->save();

        $this->emit('resetListCategories');
        $this->dispatchBrowserEvent('notification', [
            'title' => "Categoria Edtada",
            'subtitle' => "La categoria  <b>" . $this->category->name . "</b>  a sido  Editada correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->reset('img');
        $this->category = new Category();
    }
    public function delete(Category $category)
    {

        //Storage::delete('thumbnail/' . $category->img);
        //Storage::delete($category->img);

        $category->delete();

        $this->reset('img');
        $this->emit('resetListCategories');
        $this->category = new Category();
        $this->open_modal_confirmation = false;

        $this->dispatchBrowserEvent('notification', [
            'title' => "Habitacion Eliminada",
            'subtitle' => ""
        ]);
        //$category->delete()
    }



    public function updatedImg()
    {
        $this->validate([
            'img' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);
    }
    public function render()
    {
        return view('livewire.category.create-category');
    }
}
