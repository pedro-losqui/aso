<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Employee;

class SelectEmployee extends Component
{
    public $busca;

    public $employees, $cpf, $alert;

    protected $listeners = ['editEmployee'];

    public function updated()
    {
        if (strlen($this->busca) >  1) {
            $this->searchEmployee();
        }else{
            $this->selectClear();
        }
    }

    public function render()
    {
        return view('livewire.aso.components.select-employee');
    }

    public function editEmployee($id)
    {
        $employee = Employee::find($id);
        $this->busca    = $employee->name;
        $this->cpf      = $employee->cpf;
        $this->alert    = false;
    }


    public function searchEmployee()
    {
        $this->employees = Employee::where('name', 'LIKE', "%{$this->busca}%")
        ->orWhere('cpf', 'LIKE', "%{$this->busca}%")
        ->get();

        if (count($this->employees) == 0) {
            $this->alert = true;
        }
    }

    public function selectEmployee($id, $name, $cpf)
    {
        $this->busca        = $name;
        $this->cpf          = $cpf;
        $this->employees    = '';
        $this->alert        = false;
        $this->emit('selectEmployee', $id);
    }

    public function selectClear()
    {
        $this->busca     = '';
        $this->cpf       = '';
        $this->employees = '';
        $this->alert     = false;
        $this->emit('selectEmployeeClear', null);
    }
}
