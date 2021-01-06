<div>
    <label for="">Colaborador</label>
    <input type="text" wire:model.debounce.500ms='busca' class="form-control" placeholder="Colaborador">
    @if($cpf)
        <span class="badge badge-success">CPF: {{ $cpf }}</span>
    @endif
    <ul class="list-group">
        @if($employees)
            <button class="btn btn-danger mt-2" wire:click='selectClear' type="button" id="button-addon1"><i
                    class="fas fa-times-circle"></i>
            </button>
            @foreach($employees as $item)
                <li wire:click="selectEmployee('{{ $item->id }}', '{{ $item->name }}', '{{ $item->cpf }}')"
                    class="list-group-item mt-2">
                    {{ $item->name }}</li>
            @endforeach
        @endif
    </ul>
</div>
