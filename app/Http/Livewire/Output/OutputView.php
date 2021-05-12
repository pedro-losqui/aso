<?php

namespace App\Http\Livewire\Output;

use Livewire\Component;
use App\Models\Input;
use App\Models\Output;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OutputView extends Component
{
    use AuthorizesRequests;
    
    public $busca, $user_id, $status = 'Liberado';

    public $input_id, $rg, $responsible_name;

    protected $listeners = ['selectCompany', 'selectCompanyClear'];

    protected $rules = [
        'user_id'           => 'required',
        'input_id'          => '',
        'rg'                => 'required',
        'responsible_name'  => 'required',
    ];

    public function mount()
    {
        $this->input_id = [];
        $this->user_id = Auth::user()->id;
    }
    
    public function render()
    {
        $this->authorize('liberar.ver', Auth::user()->can('liberar.ver'));

        return view('livewire.output.output-view', [
            'input' => Input::where('status', 'Alocado')
            ->where(function ($query) {
                $query->orWhere('employee', 'LIKE', "%{$this->busca}%")
                      ->orWhere('company', 'LIKE', "%{$this->busca}%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function select($id)
    {
        array_push($this->input_id, $id);
    }

    public function unselect()
    {
        $this->input_id = [];
    }

    public function store()
    {
        $this->authorize('liberar.criar', Auth::user()->can('liberar.criar'));

        $this->firstUppercase();
        $this->validate();
        foreach ($this->input_id as $key => $value) {
            Output::create([
                'input_id'          => $value,
                'user_id'           => $this->user_id,
                'rg'                => $this->rg,
                'responsible_name'  => $this->responsible_name,
            ]);
        }
        $this->update();
        session()->flash('success', 'Exame(s) liberado com sucesso ;)');
        $this->emit('releaseStore');
        $this->default();
    }

    public function update()
    {
        foreach ($this->input_id as $key => $value) {
            $input = Input::find($value);
            $input->update([
                'status' => $this->status
            ]);
        }
    }

    public function selectCompany($name)
    {
        $this->company = $name;
    }

    public function selectCompanyClear($name)
    {
        $this->company = $name;
    }

    public function firstUppercase()
    {
        $this->responsible_name = ucwords(mb_strtolower($this->responsible_name, 'UTF-8'));
    }

    public function default()
    {
        $this->unselect();
        $this->rg               = '';
        $this->responsible_name = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
