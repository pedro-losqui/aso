<?php

namespace App\Http\Livewire\Company;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Company;

class CompanyView extends Component
{
    use WithPagination;

    public $busca = '', $user_id = 1;

    public $company_id, $cnpj, $name;

    protected $rules = [
        'user_id'      => 'required',
        'cnpj'         => 'required|string|unique:companies',
        'name'         => 'required|string',
    ];


    public function render()
    {
        return view('livewire.company.company-view', [
            'companies' => Company::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('cnpj', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->uppercase();
        $comapany = Company::create($this->validate());
        session()->flash('success', 'Empresa '. $comapany->name . ' registrada com sucesso ;)');
        $this->emit('companyStore');
        $this->default();
    }

    public function edit($id)
    {
        $company = Company::find($id);
        $this->company_id   = $company->id;
        $this->cnpj         = $company->cnpj;
        $this->name         = $company->name;
    }

    public function update()
    {
        $this->uppercase();
        
        $data = $this->validate([
            'user_id'      => 'required',
            'cnpj'         => 'required|string|unique:companies,cnpj, '. $this->company_id,
            'name'         => 'required|string',
        ]);

        $company = Company::find($this->company_id);
        $company->update($data);
        session()->flash('update', 'Empresa '. $company->name . ' foi atualizada com sucesso ;)');
        $this->emit('companyUpdate');
        $this->default();
    }

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
        session()->flash('delete', 'Empresa '. $company->name . ' foi exluida com sucesso ;)');
        $this->emit('companyDelete');
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

    public function clear()
    {
        $this->busca = '';
    }

}
