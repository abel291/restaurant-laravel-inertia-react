<?php

namespace App\Http\Livewire\GiftCard;

use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateGiftCard extends Component
{
    use WithFileUploads;
    public Product $gift_card;
    public $open_modal_confirmation = false;
    public $img;
    public $banner;
    protected $rules = [
        'gift_card.name' => 'required|string|max:255',
        'gift_card.description_min' => 'required|string',
        'gift_card.price' => 'required|numeric|max:255',
        'gift_card.active' => 'required|boolean',
        'gift_card.stock' => 'required|integer',
        'img' => 'nullable|image|max:1024|mimes:jpeg,jpg,png',
        'banner' => 'nullable|image|max:1024|mimes:jpeg,jpg,png',
    ];
    protected $path = 'gift-cards';

    public function mount()
    {
        $this->gift_card = new Product();
    }
    public function create()
    {
        //$this->gift_card = new Product();
        $this->gift_card = Product::factory()->make();
        $this->reset('img','banner');
        $this->resetErrorBag();
    }

    public function save()
    {

        $rules = "required|image|max:2048|mimes:jpeg,jpg,png";
        $this->rules['img'] = $rules;

        $this->validate();
        $gift_card = $this->gift_card;
        $gift_card->slug = Str::slug('gift_card_' . $gift_card->price);
        $category_id = Category::where('type', 'gift_card')->first()->id;
        $gift_card->category()->associate($category_id);
        $gift_card->img = $this->path . '/' . $gift_card->slug . '-img'  . '.' . $this->img->extension();
        $gift_card->banner = $this->path . '/' . $gift_card->slug . '-banner'  . '.' . $this->banner->extension();
        $gift_card->save();

        Helpers::image_upload($this->img, $gift_card->img, true);
        Helpers::image_upload($this->banner, $gift_card->banner);

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
            'subtitle' => "La Registro  <b>" . $this->gift_card->name . "</b>  a sido  Agregado correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->emit('resetListGiftCard');
        $this->gift_card = new Product();
        $this->reset('img','banner');
    }
    public function edit(Product $gift_card)
    {
        $this->gift_card = $gift_card;
        $this->reset('img','banner');
        $this->resetErrorBag();
    }
    public function update(Product $gift_card)
    {
        $this->validate();
        $gift_card = $this->gift_card;
        $gift_card->slug = Str::slug('gift-card-' . $gift_card->price);
        $category_id = Category::where('type', 'gift-card')->first()->id;
        $gift_card->category()->associate($category_id);
        $gift_card->save();

        if ($this->img) {
            //Storage::delete('thumbnail/' . $gift_card->img);
            //Storage::delete($gift_card->img);
            $gift_card->img = $this->path . '/' . $gift_card->slug . '-img'  . '.' . $this->img->extension();
            Helpers::image_upload($this->img, $gift_card->img, true);
        }

        if ($this->banner) {
            //Storage::delete($gift_card->banner);
            $gift_card->banner = $this->path . '/' . $gift_card->slug . '-banner'  . '.' . $this->banner->extension();
            Helpers::image_upload($this->banner, $gift_card->banner);
        }

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
            'subtitle' => "El Registro  <b>" . $this->gift_card->name . "</b>  a sido  Editado correctamente"
        ]);
        $this->reset('img','banner');
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('list-show');
        $this->emit('resetListGiftCard');
        $this->gift_card = new Product();
    }
    public function updatedImg()
    {
        $this->validate([
            'img' => 'image|max:2048|mimes:jpeg,jpg,png'
        ]);
    }
    public function updatedBanner()
    {
        $this->validate([
            'banner' => 'image|max:2048|mimes:jpeg,jpg,png'
        ]);
    }
    public function delete(Product $gift_card)
    {
        //Storage::delete('thumbnail/' . $gift_card->img);
        //Storage::delete($gift_card->img);
        //Storage::delete($gift_card->banner);
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Eliminado",
            'subtitle' => "El Registro  <b>" . $this->gift_card->name . "</b>  a sido  Eliminado correctamente"
        ]);
        $gift_card->delete();
        $this->emit('resetListGiftCard');
        $this->open_modal_confirmation = false;
    }
    public function render()
    {
        return view('livewire.gift-cart.create-gift-cart');
    }
}
