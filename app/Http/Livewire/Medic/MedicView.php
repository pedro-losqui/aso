<?php

namespace App\Http\Livewire\Medic;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Doctor;

class MedicView extends Component
{
    public $busca = '', $user_id = 1;

    public $doctor_id, $name, $crm, $uf;

    protected $rules = [
        'user_id'    => 'required',
        'name'       => 'required|string',
        'crm'        => 'required|string|unique:doctors',
        'uf'         => 'required|string',
    ];

    public function render()
    {
        return view('livewire.medic.medic-view', [
            'medics' => Doctor::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
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
    }

    public function update()
    {
        $data = $this->validate([
            'user_id'      => 'required',
            'name'         => 'required|string',
            'crm'          => 'required|string|unique:doctors,crm, ' . $this->doctor_id,
            'uf'           => 'required|string',
        ]);

        $medic = Doctor::find($this->doctor_id);
        $medic->update($data);
        session()->flash('update', 'Médico(a) '. $medic->name . ' foi atualizado com sucesso ;)');
        $this->emit('medicUpdate');
    }

    public function delete($id)
    {
        $medic = Doctor::find($id);
        $medic->delete();
        session()->flash('delete', 'Médico(a) '. $medic->name . ' foi exluido com sucesso ;)');
        $this->emit('medicDelete');
    }

    public function default()
    {
        $this->name     = '';
        $this->crm      = '';
        $this->uf       = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
