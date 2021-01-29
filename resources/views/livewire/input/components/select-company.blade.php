<div>
    <label for="">Empresa</label>
    <div class="input-group">
        <input type="text" wire:model.debounce.500ms='busca' class="form-control" placeholder="Empresa">
        <div class="input-group-append">
            @if($companies  || $busca)
                <button class="btn btn-danger" type="button" wire:click='selectClear'><i
                        class="fas fa-times-circle"></i></button>
            @endif
        </div>
    </div>
    @if($alert)
        <span class="badge badge-secondary mt-2">Nenhum registro encontrado.</span>
    @endif
    @if($cnpj)
        <span class="badge badge-success">CNPJ: {{ $cnpj }}</span>
    @endif
    <ul class="list-group">
        @if($companies)
            @foreach($companies as $item)
                <li wire:click="selectCompany('{{ $item->name }}', '{{ $item->cnpj }}')"
                    class="list-group-item mt-2">
                    {{ $item->name }}</li>
            @endforeach
        @endif
    </ul>
</div>
