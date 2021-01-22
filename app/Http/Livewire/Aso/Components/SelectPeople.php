<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\People;

class SelectPeople extends Component
{
    public $busca;

    public $people, $cpf, $alert = false ;

    protected $listeners = ['editPeople'];

    public function updated()
    {
        if (strlen($this->busca) >  1) {
            $this->searchPeople();
        }else{
            $this->selectClear();
        }
    }

    public function render()
    {
        return view('livewire.aso.components.select-people');
    }

    public function editPeople($id)
    {
        $people = People::find($id);
        $this->busca    = $employee->name;
        $this->cpf      = $employee->cpf;
        $this->alert    = false;
    }

    public function searchPeople()
    {
        $this->people = People::where('name', 'LIKE', "%{$this->busca}%")
        ->orWhere('cpf', 'LIKE', "%{$this->busca}%")
        ->get();

        if (count($this->people) == 0) {
            $this->alert = true;
        }
    }

    public function selectPeople($id, $name, $cpf)
    {
        $this->busca    = $name;
        $this->cpf      = $cpf;
        $this->people   = '';
        $this->alert    = false;
        $this->emit('selectPeople', $id);
    }

    public function selectClear()
    {
        $this->busca    = '';
        $this->cpf      = '';
        $this->people   = '';
        $this->alert    = false;
        $this->emit('selectEmployeeClear', null);
    }
}
