<?php

namespace App\Http\Livewire\Input;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InputView extends Component
{
    use AuthorizesRequests;

    public $busca, $user_id = 1, $status = 'Alocado';

    public $type, $employee, $company, $allocation;

    protected $listeners = ['selectCompany', 'selectCompanyClear'];

    protected $rules = [
        'user_id'       => 'required',
        'type'          => 'required',
        'employee'      => 'required|string',
        'company'       => 'required|string',
        'allocation'    => 'required',
        'status'        => 'required',
    ];

    
    public function render()
    {
        $this->authorize('alocar.ver', Auth::user()->can('alocar.ver'));

        return view('livewire.input.input-view', [
            'inputs' => Input::where('status', 'Alocado')
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->where(function ($query) {
                $query->orWhere('employee', 'LIKE', "%{$this->busca}%")
                      ->orWhere('company', 'LIKE', "%{$this->busca}%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('alocar.criar', Auth::user()->can('alocar.criar'));

        $this->uppercase();
        $this->firstUppercase();
        $input = Input::create($this->validate());
        session()->flash('success', 'Exame alocado com sucesso ;)');
        $this->emit('allocationStore');
        $this->default();
    }

    public function selectCompany($name)
    {
        $this->company = $name;
    }

    public function selectCompanyClear($name)
    {
        $this->company = $name;
    }

    public function uppercase()
    {
        $this->company      = mb_strtoupper($this->company, 'UTF-8');
        $this->allocation   = mb_strtoupper($this->allocation, 'UTF-8');
    }

    public function firstUppercase()
    {
        $this->employee = ucwords(strtolower($this->employee));
    }

    public function default()
    {
        $this->type         = '';
        $this->employee     = '';
        $this->company      = '';
        $this->allocation   = '';
        $this->emit('selectClear');
    }

    public function clear()
    {
        $this->busca = '';
    }
}
