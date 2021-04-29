<?php

namespace App\Http\Livewire\Aso;

use Livewire\Component;
use App\Models\Aso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AsofView extends Component
{   
    use AuthorizesRequests;

    public $busca;

    public function render()
    {
        $this->authorize('aso.fisica.ver', Auth::user()->can('aso.fisica.ver'));

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

    public function editF($id)
    {
        $this->emit('editF', $id);
    }

    public function clear()
    {
        $this->busca = '';
    }
}
