<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{


    public User $user;
    public $open_modal_confirmation = false;
    public $password = '';
    public $password_confirmation = '';
    protected $rules = [
        'user.name' => 'required|string|min:6|max:255',
        'user.phone' => 'required|string|max:30',
        'user.email' => 'required|email|string|max:255',
        'user.active' => 'required|boolean|max:30',
        'password' => 'required|string|min:6|max:200|confirmed',
    ];
    public function mount()
    {
        $this->user = new User;
    }

    public function create()
    {

        $this->user = new User;
        $this->reset('password', 'password_confirmation');
        $this->resetErrorBag();
    }
    public function save()
    {

        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->save();


        $this->emit('resetListusers');
        $this->dispatchBrowserEvent('notification', [
            'title' => "Usuario Agregado",
            'subtitle' => "El usuario  <b>" . $this->user->name . "</b>  fue  Agregado correctamente"
        ]);
        $this->dispatchBrowserEvent('open-list');
    }
    public function edit(User $user)
    {

        $this->user = $user;
        $this->reset('password', 'password_confirmation');
        $this->resetErrorBag();
    }
    public function update(User $user)
    {
        $this->validate([
            'user.name' => 'required|string|min:6|max:255',
            'user.phone' => 'required|string|max:30',
            'user.active' => 'required|boolean|max:30',
            'user.email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'password' => 'sometimes|string|min:6|max:200|confirmed'
        ]);
        $user = $this->user;
        if ($this->password != '') {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        $this->reset('password', 'password_confirmation');
        $this->emit('renderListUsers');

        $this->dispatchBrowserEvent('notification', [
            'title' => "Usuario Editado",
            'subtitle' => "El usuario  <b>" . $user->name . "</b>  fue editado correctamente"
        ]);
        $this->dispatchBrowserEvent('open-list');

        $this->user = new User;
    }
    public function delete(User $user)
    {
        $name = $user->name;
        $this->open_modal_confirmation = false;
        $user->delete();
        $this->user = new User;
        $this->emit('renderListUsers');
        $this->dispatchBrowserEvent('notification', [
            'title' => "Usuario Eliminado",
            'subtitle' => "El usuario  <b>" . $name . "</b>  fue quitado de la lista"
        ]);
    }
    public function render()
    {
        return view('livewire.user.create-user');
    }
}
