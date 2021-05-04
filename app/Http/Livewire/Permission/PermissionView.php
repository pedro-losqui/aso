<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PermissionView extends Component
{
    use AuthorizesRequests;
    
    public $permission = [
    'colaborador', 'empresa', 'pessoa.fisica', 'medico', 'exames', 'parecer', 'aso.juridica', 'aso.fisica', 'historico.aso', 'alocar', 
    'liberar', 'historico.liberacao', 'resgistro', 'historico.registro', 'perfil', 'usuario', 'permissao', 'regra.acesso'
    ];
    
    public $name;

    protected $rules = [
        'name'   => 'required|string',
    ];

    public function render()
    {
        $this->authorize('permissao.ver', Auth::user()->can('permissao.ver'));

        return view('livewire.permission.permission-view',[
            'permissions' => Permission::all()
        ]);
    }

    public function store()
    {
        $this->authorize('permissao.criar', Auth::user()->can('permissao.criar'));

        $this->firstUppercase();
        $permission = Permission::create($this->validate());
        session()->flash('success', 'Permissão gerada com sucesso ;)');
        $this->emit('permissionStore');
        $this->default();
    }

    public function firstUppercase()
    {
        $this->name = strtolower($this->name);
        
    }

    public function default()
    {
        $this->name  = '';
    }
}
