<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionView extends Component
{
    public $name;

    protected $rules = [
        'name'   => 'required|string',
    ];

    public function render()
    {
        return view('livewire.permission.permission-view',[
            'permissions' => Permission::all()
        ]);
    }

    public function store()
    {
        $this->firstUppercase();
        $permission = Permission::create($this->validate());
        session()->flash('success', 'Permissão gerada com sucesso ;)');
        $this->emit('permissionStore');
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
