<?php

namespace App\Http\Livewire\Aso;

use Livewire\Component;
use App\Models\Aso;

class AsojView extends Component
{
    public $busca, $results, $employees;

    public function render()
    {
        return view('livewire.aso.asoj-view', [
            'aso' => Aso::whereNotNull('company_id')
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
