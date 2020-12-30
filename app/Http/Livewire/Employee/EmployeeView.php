<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;

class EmployeeView extends Component
{
    public $busca = '';

    public $user_id = 1;
    
    public $cpf, $name, $born_date, $gender;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|string',
        'name'         => 'required|string',
        'born_date'    => 'required',
        'gender'       => 'required',
    ];

    public function render()
    {
        return view('livewire.employee.employee-view', [
            'employees' => Employee::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $employee = Employee::create($this->validate());
        session()->flash('success', 'Colaborador '. $employee->name . ' registrado com sucesso ;)');
        $this->emit('employeeStore');
        $this->default();
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        session()->flash('delete', 'Colaborador '. $employee->name . ' foi exluido com sucesso ;)');
        $this->emit('employeeDelete');
    }

    public function default()
    {
        $this->cpf          = '';
        $this->name         = '';
        $this->born_date    = '';
        $this->gender       = '';
    }
}
