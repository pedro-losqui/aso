<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Company;

class CompanyCreate extends Component
{
    public $user_id = 1;

    public $cnpj, $name;

    protected $rules = [
        'user_id'      => 'required',
        'cnpj'         => 'required|string|unique:companies',
        'name'         => 'required|string',
    ];

    public function render()
    {
        return view('livewire.aso.components.company-create');
    }

    public function store()
    {
        $this->uppercase();
        $comapany = Company::create($this->validate());
        session()->flash('success', 'Empresa '. $comapany->name . ' registrada com sucesso ;)');
        $this->emit('companyStoreAso');
        $this->default();
    }

    public function uppercase()
    {
        $this->name = strtoupper($this->name);
    }

    public function default()
    {
        $this->cnpj = '';
        $this->name = '';
    }

    public function close()
    {
        $this->emit('companyStoreAso');
    }

}
