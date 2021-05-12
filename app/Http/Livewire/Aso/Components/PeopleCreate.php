<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\People;

class PeopleCreate extends Component
{
    public $user_id = '1';

    public $people_id, $cpf, $name;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|cpf|string|unique:people',
        'name'         => 'required|string',
    ];

    public function render()
    {
        return view('livewire.aso.components.people-create');
    }

    public function store()
    {
        $this->uppercase();
        $people = People::create($this->validate());
        session()->flash('success', 'Pessoa física '. $people->name . ' registrada com sucesso ;)');
        $this->emit('peopleStoreAso');
        $this->default();
    }

    public function edit($id)
    {
        $people = People::find($id);
        $this->people_id   = $people->id;
        $this->cpf         = $people->cpf;
        $this->name        = $people->name;
    }

    public function uppercase()
    {
        $this->name = ucwords(mb_strtolower($this->name, 'UTF-8'));
    }

    public function default()
    {
        $this->cpf          = '';
        $this->name         = '';
    }

    public function clear()
    {
        $this->busca = '';
    }

    public function close()
    {
        $this->emit('peopleStoreAso');
    }
}
