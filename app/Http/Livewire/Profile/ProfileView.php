<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class ProfileView extends Component
{
    public $name;

    protected $rules = [
        'name'   => 'required|string',
    ];

    public function render()
    {
        return view('livewire.profile.profile-view', [
            'profiles' => Role::all()
        ]);
    }

    public function store()
    {
        $this->firstUppercase();
        $role = Role::create($this->validate());
        session()->flash('success', 'Perfil gerado com sucesso ;)');
        $this->emit('profileceStore');
        $this->default();
    }

    public function firstUppercase()
    {
        $this->name = ucwords(strtolower($this->name));
        
    }

    public function default()
    {
        $this->name  = '';
    }

}
