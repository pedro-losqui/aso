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
            ->whereHas('employee', function($query) {
                $query->where('name', 'LIKE', "%{$this->busca}%");
            })
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->orderBy('id', 'DESC')
            ->get()
        ]);
    }

    public function edit($id)
    {
        $this->emit('edit', $id);
    }

    public function clear()
    {
        $this->busca = '';
    }
}
