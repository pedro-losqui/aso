<?php

namespace App\Http\Livewire\Medic;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MedicView extends Component
{
    use AuthorizesRequests;

    public $busca = '', $user_id;

    public $doctor_id, $name, $crm, $uf, $rqe = '';

    protected $rules = [
        'user_id'    => 'required',
        'name'       => 'required|string',
        'crm'        => 'required|string|unique:doctors',
        'uf'         => 'required|string',
        'rqe'        => 'nullable',
    ];

    public function mount()
    {
       $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $this->authorize('medico.ver', Auth::user()->can('medico.ver'));

        return view('livewire.medic.medic-view', [
            'medics' => Doctor::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('medico.criar', Auth::user()->can('medico.criar'));

        $this->firstUppercase();
        $doctor = Doctor::create($this->validate());
        session()->flash('success', 'Médico(a) '. $doctor->name . ' registrado com sucesso ;)');
        $this->emit('medicStore');
        $this->default();
    }

    public function edit($id)
    {
        $medic = Doctor::find($id);
        $this->doctor_id   = $medic->id;
        $this->name        = $medic->name;
        $this->crm         = $medic->crm;
        $this->uf          = $medic->uf;
        $this->rqe         = $medic->rqe;
    }

    public function update()
    {
        $this->authorize('medico.editar', Auth::user()->can('medico.editar'));

        $this->firstUppercase();

        $data = $this->validate([
            'user_id'      => 'required',
            'name'         => 'required|string',
            'crm'          => 'required|string|unique:doctors,crm, ' . $this->doctor_id,
            'uf'           => 'required|string',
            'rqe'          => 'nullable',
        ]);

        $medic = Doctor::find($this->doctor_id);
        $medic->update($data);
        session()->flash('update', 'Médico(a) '. $medic->name . ' foi atualizado com sucesso ;)');
        $this->emit('medicUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $this->authorize('medico.excluir', Auth::user()->can('medico.excluir'));

        $medic = Doctor::find($id);
        $medic->delete();
        session()->flash('delete', 'Médico(a) '. $medic->name . ' foi exluido com sucesso ;)');
        $this->emit('medicDelete');
    }

    public function firstUppercase()
    {
        $this->name = ucwords(mb_strtolower($this->name, 'UTF-8'));
    }

    public function default()
    {
        $this->name     = '';
        $this->crm      = '';
        $this->uf       = '';
        $this->rqe      = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
