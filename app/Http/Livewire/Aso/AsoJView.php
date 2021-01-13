<?php

namespace App\Http\Livewire\Aso;

use Livewire\Component;
use App\Models\Aso;

class AsojView extends Component
{
    public $busca, $results, $employees;

    public function updated()
    {
        //dd($this->render());
    }

    public function render()
    {
        return view('livewire.aso.asoj-view', [
            'aso' => Aso::whereNotNull('company_id')
            ->whereHas('employee', function($query) {
                $query->where('name', 'LIKE', "%{$this->busca}%");
            })
            ->orderBy('id', 'DESC')
            ->get()
        ]);
    }

    public function clear()
    {
        $this->busca = '';
    }

}
