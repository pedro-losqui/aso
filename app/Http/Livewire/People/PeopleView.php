<?php

namespace App\Http\Livewire\People;

use App\Models\People;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PeopleView extends Component
{
    use AuthorizesRequests;

    public $busca = '', $user_id;

    public $people_id, $cpf, $name;

    protected $rules = [
        'user_id'      => 'required',
        'cpf'          => 'required|cpf|string|unique:people',
        'name'         => 'required|string',
    ];

    public function mount()
    {
       $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $this->authorize('pessoa.fisica.ver', Auth::user()->can('pessoa.fisica.ver'));

        return view('livewire.people.people-view', [
            'people' => People::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('cpf', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('pessoa.fisica.criar', Auth::user()->can('pessoa.fisica.criar'));

        $this->uppercase();
        $people = People::create($this->validate());
        session()->flash('success', 'Pessoa física '. $people->name . ' registrada com sucesso ;)');
        $this->emit('peopleStore');
        $this->default();
    }

    public function edit($id)
    {
        $this->authorize('pessoa.fisica.editar', Auth::user()->can('pessoa.fisica.editar'));

        $people = People::find($id);
        $this->people_id   = $people->id;
        $this->cpf         = $people->cpf;
        $this->name        = $people->name;
    }

    public function update()
    {
        $this->uppercase();

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
        $this->authorize('pessoa.fisica.excluir', Auth::user()->can('pessoa.fisica.excluir'));

        $people = People::find($id);
        $people->delete();
        session()->flash('delete', 'Pessoa física '. $people->name . ' foi exluida com sucesso ;)');
        $this->emit('peopleDelete');
    }

    public function uppercase()
    {
        $this->name = ucwords(strtolower($this->name));
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
