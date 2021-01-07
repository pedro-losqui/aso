<div>
    <hr>
    <div class="form-group">
        <button class="btn btn-success" type="button" wire:click='selectClear'><i class="fas fa-plus"></i></button>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Exames</label>
            <input type="text" wire:model.debounce.500ms='busca' class="form-control" placeholder="Exames">
            <ul class="list-group">
                @if($exams)
                    @foreach($exams as $item)
                        <li wire:click="selectExam('{{ $item->id }}', '{{ $item->description }}')"
                            class="list-group-item mt-2">
                            {{ $item->description }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="form-group col-md-6">
            <label for="">Data</label>
            <div class="input-group">
                <input type="date" wire:model='date' class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-danger" type="button" wire:click='selectClear'><i
                            class="fas fa-times-circle"></i></button>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
