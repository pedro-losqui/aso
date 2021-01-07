<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Conclusion;

class SelectConclusion extends Component
{
    public $busca;

    public $conclusion_id;

    public function updated()
    {
        $this->selectConclusion($this->conclusion_id);
    }

    public function render()
    {
        return view('livewire.aso.components.select-conclusion', [
            'conclusions' => Conclusion::all()
        ]);
    }

    public function selectConclusion($id)
    {
        $this->emit('selectConclusion', $id);
    }


}
