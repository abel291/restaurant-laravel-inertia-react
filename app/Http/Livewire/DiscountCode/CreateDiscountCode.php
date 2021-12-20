<?php

namespace App\Http\Livewire\DiscountCode;

use App\Models\DiscountCode;
use Livewire\Component;

class CreateDiscountCode extends Component

{

    public DiscountCode $discount_code;
    public $open_modal_confirmation = false;

    // protected $rules = [
    //     'discount_code.name' => 'required|string|max:255',
    //     'discount_code.type' => 'required|in:percent,amount',
    //     'discount_code.description' => 'required|string|max:255',
    //     'discount_code.value' => 'required|integer',
    //     'discount_code.code' => 'required|string|max:10',
    //     'discount_code.active' => 'required|boolean',
    //     'discount_code.stock' => 'required|integer',
    // ];

    protected function rules()
    {
        $rules = [];
        $rules = [
            'discount_code.name' => 'required|string|max:255',
            'discount_code.type' => 'required|in:percent,amount',
            'discount_code.description' => 'required|string|max:255',
            'discount_code.value' => 'required|integer',
            'discount_code.code' => 'required|string|max:8|unique:discount_codes,code,'.$this->discount_code->id,
            'discount_code.active' => 'required|boolean',
            'discount_code.stock' => 'required|integer',
        ];
        if ($this->discount_code->type == 'percent') {
            $rules['discount_code.value'] .= '|max:100';
        }
        return $rules;
    }

    public function mount()
    {
        $this->discount_code = new DiscountCode();
    }
    public function create()
    {
        //$this->discount_code = new DiscountCode();
        $this->discount_code = DiscountCode::factory()->make();
        $this->resetErrorBag();
    }

    public function save()
    {

        $this->validate();
        $discount_code = $this->discount_code;
        $discount_code->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
            'subtitle' => "La Registro  <b>" . $this->discount_code->code . "</b>  a sido  Agregado correctamente"
        ]);

        $this->dispatchBrowserEvent('list-show');
        $this->emit('resetListDiscountCode');
        $this->discount_code = new DiscountCode();
    }
    public function edit(DiscountCode $discount_code)
    {
        $this->discount_code = $discount_code;
        $this->resetErrorBag();
    }
    public function update(DiscountCode $discount_code)
    {
        $this->validate();
        $discount_code = $this->discount_code;
        $discount_code->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
            'subtitle' => "El Registro  <b>" . $this->discount_code->name . "</b>  a sido  Editado correctamente"
        ]);

        $this->resetErrorBag();
        $this->dispatchBrowserEvent('list-show');
        $this->emit('resetListDiscountCode');
        $this->discount_code = new DiscountCode();
    }

    public function delete(DiscountCode $discount_code)
    {
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Eliminado",
            'subtitle' => "El Registro  <b>" . $this->discount_code->name . "</b>  a sido  Eliminado correctamente"
        ]);
        $discount_code->delete();
        $this->emit('resetListDiscountCode');
        $this->open_modal_confirmation = false;
    }
    public function render()
    {
        return view('livewire.discount-code.create-discount-code');
    }
}
