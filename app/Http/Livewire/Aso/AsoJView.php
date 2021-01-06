<?php

namespace App\Http\Livewire\Aso;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Aso;

class AsoJView extends Component
{
    public $busca = '',  $user_id = 1;

    public $type, $company_id, $employee_id, $workplace, $post;

    protected $listeners = ['selectCompany', 'selectEmployee'];

    protected $rules = [
        'type'          => 'required|string',
        'company_id'    => 'required|integer',
        'employee_id'   => 'required|integer',
        'workplace'     => 'required|string',
        'post'          => 'required|string'
    ];

    public function render()
    {
        return view('livewire.aso.aso-j-view', [
            'aso' => Aso::whereNotNull('company_id') 
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->validate();
    }

    public function selectCompany($id)
    {
        $this->company_id = $id;
    }

    public function selectEmployee($id)
    {
        $this->employee_id = $id;
    }

    public function default()
    {
    }

    public function clear()
    {
        $this->busca = '';
    }
}
