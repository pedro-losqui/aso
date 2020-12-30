<?php

namespace App\Http\Livewire\Employee;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Employee;

class EmployeeView extends Component
{
    use WithPagination;

    public $busca = '', $user_id = 1;

    public $employee_id, $cpf, $name, $born_date, $gender;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|string|unique:employees',
        'name'         => 'required|string',
        'born_date'    => 'required|date',
        'gender'       => 'required',
    ];

    public function render()
    {
        return view('livewire.employee.employee-view', [
            'employees' => Employee::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('cpf', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $employee = Employee::create($this->validate());
        session()->flash('success', 'Colaborador(a) '. $employee->name . ' registrado com sucesso ;)');
        $this->emit('employeeStore');
        $this->default();
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $this->employee_id = $employee->id;
        $this->cpf         = $employee->cpf;
        $this->name        = $employee->name;
        $this->born_date   = $employee->born_date;
        $this->gender      = $employee->gender;
    }

    public function update()
    {
        $data = $this->validate([
            'user_id'      => 'required',
            'cpf'          => 'required|string|unique:employees,cpf, '. $this->employee_id,
            'name'         => 'required|string',
            'born_date'    => 'required|date',
            'gender'       => 'required',
        ]);

        $employee = Employee::find($this->employee_id);
        $employee->update($data);
        session()->flash('update', 'Colaborador(a) '. $employee->name . ' foi atualizado com sucesso ;)');
        $this->emit('employeeUpdate');
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        session()->flash('delete', 'Colaborador(a) '. $employee->name . ' foi exluido com sucesso ;)');
        $this->emit('employeeDelete');
    }

    public function default()
    {
        $this->cpf          = '';
        $this->name         = '';
        $this->born_date    = '';
        $this->gender       = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
