<?php

namespace App\Http\Livewire\Aso;

use App\Models\Aso;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AsojView extends Component
{
    use AuthorizesRequests, WithPagination;
    
    public $busca, $results, $employees;

    public function render()
    {
        $this->authorize('aso.juridica.ver', Auth::user()->can('aso.juridica.ver'));

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

    public function editJ($id)
    {
        $this->emit('editJ', $id);
    }

    public function clear()
    {
        $this->busca = '';
    }

}
