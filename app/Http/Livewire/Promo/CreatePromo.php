<?php

namespace App\Http\Livewire\Promo;

use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\Page;
use App\Models\Promo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreatePromo extends Component
{

    use WithFileUploads;
    public Promo $promo;
    public $categories;
    public $product_id;

    public $pages;
    public $pages_selected = [];

    public $img;
    public $open_modal_confirmation = false;

    protected $rules = [
        'promo.title' => 'required|string|max:255',
        'promo.sub_title' => 'required|string|max:255',
        'promo.start_date' => 'required|date_format:Y-m-d|before:promo.end_date',
        'promo.end_date' => 'required|date_format:Y-m-d|after:promo.start_date',
        'promo.active' => 'required|boolean',
        'product_id' => 'required|exists:products,id',
        'img' => 'image|max:2048|mimes:jpeg,jpg,png',
    ];
    protected $path = 'promos';
    //
    public function mount()
    {   
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Edtado",
            'subtitle' => "d"
        ]);
        $this->promo = new Promo();
        $this->categories = Category::with('products')->get();
        $this->pages = Page::get();
    }
    public function create()
    {   
        //$this->promo = new Promo();
        $this->promo = Promo::factory()->make();        
        $this->reset('img','product_id');
        $this->resetErrorBag();
    }
    public function save()
    {   
        
        $this->rules['img'] = "required|image|max:2048|mimes:jpeg,jpg,png";
        $this->validate();
        $promo = $this->promo;
        $promo->product()->associate($this->product_id);
        $slug = Str::slug($promo->title . $promo->sub_title);
        $promo->img = $this->path . '/' . $slug . '-img'  . '.' . $this->img->extension();
        $promo->save();

        $promo->pages()->sync($this->pages_selected);

        Helpers::image_upload($this->img, $promo->img, true);

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregadao",
            'subtitle' => "El registro  <b>" . $this->promo->title . " " . $this->promo->sub_title . "</b>  a sido  Agregado correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->reset('img');
        $this->emit('resetListPromo');
        $this->promo = new Promo();
    }

    public function edit(Promo $promo)
    {
        $this->promo = $promo;
        $this->product_id = $promo->product_id;
        $this->pages_selected = $promo->pages->pluck('id', 'id');

        $this->reset('img');
        $this->resetErrorBag();
    }
    public function update()
    {
        $this->rules['img'] = "nullable|image|max:2048|mimes:jpeg,jpg,png";
        $this->validate();
        $promo = $this->promo;

        if ($this->img) {
            //Storage::delete('thumbnail/' . $promo->img);
            //Storage::delete($promo->img);
            $slug = Str::slug($promo->title . $promo->sub_title);
            $promo->img = $this->path . '/' . $slug . '-img'  . '.' . $this->img->extension();
            Helpers::image_upload($this->img, $promo->img, true);
        }
        $promo->save();
        $promo->pages()->sync($this->pages_selected);
        $this->emit('resetListPromo');
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Edtado",
            'subtitle' => "El registro  <b>" . $this->promo->title . " " . $this->promo->sub_title . "</b>  a sido  Editado correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->reset('img');
        $this->promo = new Promo();
    }
    public function delete(Promo $promo)
    {

        //Storage::delete('thumbnail/' . $promo->img);
        //Storage::delete($promo->img);

        $promo->delete();

        $this->reset('img');
        $this->emit('resetListPromo');
        $this->promo = new Promo();
        $this->open_modal_confirmation = false;

        $this->dispatchBrowserEvent('notification', [
            'title' => "Habitacion Eliminada",
            'subtitle' => ""
        ]);
        //$promo->delete()
    }

    public function updatedImg()
    {
        $this->validate([
            'img' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);
    }

    public function render()
    {
        return view('livewire.promo.create-promo');
    }
}
