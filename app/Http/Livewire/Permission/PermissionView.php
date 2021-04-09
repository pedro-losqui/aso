<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionView extends Component
{
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
        $this->name = strtolower($this->name);
        
    }

    public function default()
    {
        $this->name  = '';
    }
}
