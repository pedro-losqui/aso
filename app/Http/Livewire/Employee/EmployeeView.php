<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;

class EmployeeView extends Component
{
    use WithPagination, AuthorizesRequests;

    public $busca = '', $user_id;

    public $employee_id, $cpf, $name, $born_date, $gender;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|cpf|string|unique:employees',
        'name'         => 'required|string',
        'born_date'    => 'required|date',
        'gender'       => 'required',
    ];

    public function mount()
    {
       $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $this->authorize('colaborador.ver', Auth::user()->can('colaborador.ver'));
        
        return view('livewire.employee.employee-view', [
            'employees' => Employee::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('cpf', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('colaborador.criar', Auth::user()->can('colaborador.criar'));

        $this->firstUppercase();
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
        $this->authorize('colaborador.editar', Auth::user()->can('colaborador.editar'));
        
        $this->uppercase();

        $data = $this->validate([
            'user_id'      => 'required',
            'cpf'          => 'required|cpf|string|unique:employees,cpf, '. $this->employee_id,
            'name'         => 'required|string',
            'born_date'    => 'required|date',
            'gender'       => 'required',
        ]);
        
        $employee = Employee::find($this->employee_id);
        $employee->update($data);
        session()->flash('update', 'Colaborador(a) '. $employee->name . ' foi atualizado com sucesso ;)');
        $this->emit('employeeUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $this->authorize('colaborador.excluir', Auth::user()->can('colaborador.excluir'));

        $employee = Employee::find($id);
        $employee->delete();
        session()->flash('delete', 'Colaborador(a) '. $employee->name . ' foi exluido com sucesso ;)');
        $this->emit('employeeDelete');
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

    public function clear()
    {
        $this->busca = '';
    }
}
