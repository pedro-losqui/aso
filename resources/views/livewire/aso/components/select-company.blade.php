<div>
    <livewire:aso.components.company-create />
    <label for="">Empresa</label>
    <input type="text" wire:model.debounce.500ms='busca' class="form-control" placeholder="Empresa">
    @if(!$cnpj)
    <button type="button" class="btn btn-info btn-sm mt-2" data-toggle="modal" data-target=".createCompanyAso"><i class="fas fa-building mr-2"></i>
        Adicionar</button>
    @endif
    @if($cnpj)
        <span class="badge badge-success">CNPJ: {{ $cnpj }}</span>
    @endif
    <ul class="list-group">
        @if($companies)
            <button class="btn btn-danger mt-2" wire:click='selectClear' type="button" id="button-addon1"><i
                    class="fas fa-times-circle"></i>
            </button>
            @foreach($companies as $item)
                <li wire:click="selectCompany('{{ $item->id }}', '{{ $item->name }}', '{{ $item->cnpj }}')"
                    class="list-group-item mt-2">
                    {{ $item->name }}</li>
            @endforeach
        @endif
    </ul>
</div>
