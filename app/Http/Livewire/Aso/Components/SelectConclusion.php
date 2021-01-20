<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Conclusion;

class SelectConclusion extends Component
{
    public $busca;

    public $conclusion_id;

    protected $listeners = ['editConclusion'];

    public function updated()
    {
        $this->selectConclusion($this->conclusion_id);
    }
    
    public function render()
    {
        return view('livewire.aso.components.select-conclusion', [
            'conclusions' => Conclusion::orderBy('description', 'ASC')
            ->get()
        ]);
    }

    public function editConclusion($id)
    {
        $conclusion = Conclusion::find($id);
        $this->conclusion_id = $conclusion->id;
    }

    public function selectConclusion($id)
    {
        $this->emit('selectConclusion', $id);
    }
}
