<?php

namespace App\Http\Livewire\Input\Components;

use Livewire\Component;
use App\Models\Company;

class SelectCompany extends Component
{
    public $busca;

    public $company, $companies, $cnpj, $alert;

    protected $listeners = ['selectClear'];

    public function updated()
    {
        if (strlen($this->busca) >  1) {
            $this->searchCompany();
        }else{
            $this->selectClear();
        }
    }

    public function render()
    {
        return view('livewire.input.components.select-company');
    }

    public function editCompany($id)
    {
        $company = Company::find($id);
        $this->busca        = $company->name;
        $this->cnpj         = $company->cnpj;
        $this->alert        = false;
    }

    public function searchCompany()
    {
        $this->companies = Company::where('name', 'LIKE', "%{$this->busca}%")
        ->orWhere('cnpj', 'LIKE', "%{$this->busca}%")
        ->get();

        if (count($this->companies) == 0) {
            $this->alert = true;
        }
    }

    public function selectCompany($name, $cnpj)
    {
        $this->busca        = $name;
        $this->cnpj         = $cnpj;
        $this->companies    = '';
        $this->alert        = false;
        $this->emit('selectCompany', $name);
    }

    public function selectClear()
    {
        $this->busca     = '';
        $this->cnpj      = '';
        $this->companies = '';
        $this->alert     = false;
        $this->emit('selectCompanyClear', null);
    }
}
