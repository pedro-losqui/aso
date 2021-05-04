<?php

namespace App\Http\Livewire\Access;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AccessView extends Component
{
    use AuthorizesRequests;

    public $permission = [
        'colaborador', 'empresa', 'pessoa.fisica', 'medico', 'exames', 'parecer', 'aso.juridica', 'aso.fisica', 'historico.aso', 'alocar', 
        'liberar', 'historico.liberacao', 'resgistro', 'historico.registro', 'perfil', 'usuario', 'permissao', 'regra.acesso'
        ];
        
    public $role = [], $roleChecked = [], $roleCheckedResponse = [], $permissions = [], $select= '0';

    public function mount()
    {
        $this->getRole();
    }

    public function updated()
    {
        $this->getPermision();
        $this->getRoleChecked();
    }

    public function render()
    {
        $this->authorize('regra.acesso.ver', Auth::user()->can('regra.acesso.ver'));

        return view('livewire.access.access-view');
    }

    public function store($id)
    {
        $role = Role::find($this->select);
        $role->givePermissionTo($id);
        $this->getRole();
        $this->getRoleChecked();
    }

    public function revoke($id)
    {
        $role = Role::find($this->select);
        $role->revokePermissionTo($id);
        $this->getRoleChecked();
    }

    public function getRole()
    {
        $this->role = Role::all();
    }

    public function getRoleChecked()
    {
        $this->roleCheckedResponse = [];
        
        $this->roleChecked = Role::find($this->select);
        foreach ($this->roleChecked->permissions as $item) {
            array_push($this->roleCheckedResponse, $item->name);
        }
    }

    public function getPermision()
    {
        $this->permissions = [];
        $this->permissions = Permission::all();
    }
}
