<?php

namespace App\Http\Livewire\Aso\Components;

use Livewire\Component;
use App\Models\Company;

class SelectCompany extends Component
{
    public $busca= '';

    public $companies, $cnpj;

    public function updated()
    {
        $this->searchCompany();
    }

    public function render()
    {
        return view('livewire.aso.components.select-company');
    }

    public function searchCompany()
    {
        $this->companies = Company::where('name', 'LIKE', "%{$this->busca}%")
        ->orWhere('cnpj', 'LIKE', "%{$this->busca}%")
        ->get();
    }

    public function selectCompany($id, $name, $cnpj)
    {
        $this->busca        = $name;
        $this->cnpj         = $cnpj;
        $this->companies    = '';
        $this->emit('selectCompany', $id);
    }

    public function selectClear()
    {
        $this->busca     = '';
        $this->companies = '';
    }
}
