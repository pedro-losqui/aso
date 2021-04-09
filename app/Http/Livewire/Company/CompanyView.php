<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompanyView extends Component
{
    use WithPagination, AuthorizesRequests;

    public $busca = '', $user_id;

    public $company_id, $cnpj, $name;

    protected $rules = [
        'user_id'      => 'required',
        'cnpj'         => 'required|cnpj|string|unique:companies',
        'name'         => 'required|string',
    ];

    public function mount()
    {
       $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $this->authorize('empresa.ver', Auth::user()->can('empresa.ver'));

        return view('livewire.company.company-view', [
            'companies' => Company::where('name', 'LIKE', "%{$this->busca}%")
            ->orWhere('cnpj', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->authorize('empresa.criar', Auth::user()->can('empresa.criar'));

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
        $this->authorize('empresa.editar', Auth::user()->can('empresa.editar'));
        
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
        $this->authorize('empresa.excluir', Auth::user()->can('empresa.excluir'));

        $company = Company::find($id);
        $company->delete();
        session()->flash('delete', 'Empresa '. $company->name . ' foi exluida com sucesso ;)');
        $this->emit('companyDelete');
    }

    public function uppercase()
    {
        $this->name = mb_strtoupper($this->name, 'UTF-8');
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
