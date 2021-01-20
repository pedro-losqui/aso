<?php

namespace App\Http\Livewire\Conclusion;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Conclusion;

class ConclusionView extends Component
{
    public $busca = '', $user_id = 1;

    public $conclusion_id, $description;

    protected $rules = [
        'user_id'       => 'required',
        'description'   => 'required|string',
    ];

    public function render()
    {
        return view('livewire.conclusion.conclusion-view', [
            'conclusions' => Conclusion::where('description', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->firstUppercase();
        $conclusion = Conclusion::create($this->validate());
        session()->flash('success', 'Parecer '. $conclusion->description . ' registrado com sucesso ;)');
        $this->emit('conclusionStore');
        $this->default();
    }

    public function edit($id)
    {
        $conclusion = Conclusion::find($id);
        $this->conclusion_id    = $conclusion->id;
        $this->description      = $conclusion->description;
    }

    public function update()
    {
        $data = $this->validate([
            'user_id'       => 'required',
            'description'   => 'required|string'
        ]);

        $conclusion = Conclusion::find($this->conclusion_id);
        $conclusion->update($data);
        session()->flash('update', 'Parecer '. $conclusion->description . ' foi atualizado com sucesso ;)');
        $this->emit('conclusionUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $conclusion = Conclusion::find($id);
        $conclusion->delete();
        session()->flash('delete', 'Parecer '. $conclusion->description . ' foi exluido com sucesso ;)');
        $this->emit('conclusionDelete');
    }

    public function firstUppercase()
    {
        $words = strtolower($this->description);
        $this->description = ucwords($words);
    }

    public function default()
    {
        $this->description  = '';
    }

    public function clear()
    {
        $this->busca = '';
    }
}
