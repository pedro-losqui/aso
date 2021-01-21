<?php

namespace App\Http\Livewire\Aso;

use Livewire\Component;
use App\Models\Aso;

class AsofView extends Component
{   
    public $busca;

    public function render()
    {
        return view('livewire.aso.asof-view',[
            'aso' => Aso::whereNotNull('people_id')
            ->whereHas('people', function($query) {
                $query->where('name', 'LIKE', "%{$this->busca}%");
            })
            ->orderBy('id', 'DESC')
            ->get()
        ]);
    }
}
