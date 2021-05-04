<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileView extends Component
{
    use AuthorizesRequests;

    public $name;

    protected $rules = [
        'name'   => 'required|string',
    ];

    public function render()
    {
        $this->authorize('perfil.ver', Auth::user()->can('perfil.ver'));
        
        return view('livewire.profile.profile-view', [
            'profiles' => Role::all()
        ]);
    }

    public function store()
    {
        $this->authorize('perfil.criar', Auth::user()->can('perfil.criar'));

        $this->firstUppercase();
        $role = Role::create($this->validate());
        session()->flash('success', 'Perfil gerado com sucesso ;)');
        $this->emit('profileStore');
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
