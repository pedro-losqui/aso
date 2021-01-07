<?php

namespace App\Http\Livewire\Aso;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Aso;

class AsoJView extends Component
{
    public $busca = '',  $user_id = 1;

    public $type, $company_id, $employee_id, $doctor_id, $conclusion_id, $workplace, $post, $physicist, $chemical, $biological, $ergonomic, $accident;

    protected $listeners = ['selectCompany', 'selectEmployee', 'selectConclusion'];

    protected $rules = [
        'type'          => 'required|string',
        'company_id'    => 'required|integer',
        'employee_id'   => 'required|integer',
        'doctor_id'     => '',
        'conclusion_id' => '',
        'workplace'     => 'required|string',
        'post'          => 'required|string',
        'physicist'     => '',
        'chemical'      => '',
        'biological'    => '',
        'ergonomic'     => '',
        'accident'      => '',
    ];

    public function render()
    {
        return view('livewire.aso.aso-j-view', [
            'aso' => Aso::whereNotNull('company_id') 
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function storeAso()
    {
        dd($this->validate());
    }

    public function selectCompany($id)
    {
        $this->company_id = $id;
    }

    public function selectEmployee($id)
    {
        $this->employee_id = $id;
    }

    public function selectConclusion($id)
    {
        $this->conclusion_id = $id;
    }

    public function default()
    {
    }

    public function clear()
    {
        $this->busca = '';
    }
}
