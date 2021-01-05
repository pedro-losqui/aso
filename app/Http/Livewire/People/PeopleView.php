<?php

namespace App\Http\Livewire\People;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\People;

class PeopleView extends Component
{
    public $busca = '', $user_id = 1;

    public $people_id, $cpf, $name;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|string|unique:people',
        'name'         => 'required|string',
    ];

    public function render()
    {
        return view('livewire.people.people-view', [
            'people' => People::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('cpf', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $people = People::create($this->validate());
        session()->flash('success', 'Pessoa física '. $people->name . ' registrada com sucesso ;)');
        $this->emit('peopleStore');
        $this->default();
    }

    public function edit($id)
    {
        $people = People::find($id);
        $this->people_id   = $people->id;
        $this->cpf         = $people->cpf;
        $this->name        = $people->name;
    }

    public function update()
    {
        $data = $this->validate([
            'user_id'      => 'required',
            'cpf'          => 'required|string|unique:people,cpf, '. $this->people_id,
            'name'         => 'required|string',
        ]);

        $people = People::find($this->people_id);
        $people->update($data);
        session()->flash('update', 'Pessoa física '. $people->name . ' foi atualizada com sucesso ;)');
        $this->emit('peopleUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $people = People::find($id);
        $people->delete();
        session()->flash('delete', 'Pessoa física '. $people->name . ' foi exluida com sucesso ;)');
        $this->emit('peopleDelete');
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
}
