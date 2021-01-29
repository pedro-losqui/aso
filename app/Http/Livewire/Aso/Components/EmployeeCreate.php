<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Employee;

class EmployeeCreate extends Component
{
    public $user_id = 1;

    public $cpf, $name, $born_date, $gender;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|cpf|string|unique:employees',
        'name'         => 'required|string',
        'born_date'    => 'required|date',
        'gender'       => 'required',
    ];


    public function render()
    {
        return view('livewire.aso.components.employee-create');
    }

    public function store()
    {
        $this->firstUppercase();
        $employee = Employee::create($this->validate());
        $this->emit('employeeStoreAso');
        $this->default();
    }

    public function firstUppercase()
    {
        $words = strtolower($this->name);
        $this->name = ucwords($words);
    }

    public function default()
    {
        $this->cpf          = '';
        $this->name         = '';
        $this->born_date    = '';
        $this->gender       = '';
    }

    public function close()
    {
        $this->emit('employeeStoreAso');
    }
}
