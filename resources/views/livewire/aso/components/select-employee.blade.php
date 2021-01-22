<div>
    <label for="">Colaborador</label>
    <div class="input-group">
        <input type="text" wire:model.debounce.500ms='busca' class="form-control" placeholder="Colaborador">
        <div class="input-group-append">
            @if($employees  || $busca)
                <button class="btn btn-danger" type="button" wire:click='selectClear'><i
                        class="fas fa-times-circle"></i></button>
            @endif
        </div>
    </div>
    @if($alert)
        <span class="badge badge-secondary mt-2">Nenhum registro encontrado.</span>
    @endif
    @if($cpf)
        <span class="badge badge-success">CPF: {{ $cpf }}</span>
    @endif
    <ul class="list-group">
        @if($employees)
            @foreach($employees as $item)
                <li wire:click="selectEmployee('{{ $item->id }}', '{{ $item->name }}', '{{ $item->cpf }}')"
                    class="list-group-item mt-2">
                    {{ $item->name }}</li>
            @endforeach
        @endif
    </ul>
</div>
