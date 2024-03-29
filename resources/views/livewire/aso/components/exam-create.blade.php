<div>
    <hr>
    <div class="form-group">
        <button class="btn btn-success" type="button" wire:click.prevent="add"><i
                class="fas fa-plus mt-1"></i></button>
    </div>
    @foreach($inputs as $key => $value)
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="">Exames</label>
                <select class="form-control" wire:click='searchExams' wire:model='exam_id.{{ $key }}'>
                    <option value="">Selecione</option>
                    @foreach($exams as $item)
                        <option value="{{ $item->id }}">{{ $item->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Data</label>
                <div class="input-group">
                    <input type="date" wire:model='date.{{ $key }}' class="form-control">
                    <div class="input-group-append">
                        @if($i > 1)
                            <button class="btn btn-danger" type="button"
                                wire:click.prevent="remove('{{ $key }}')"><i
                                    class="fas fa-times-circle mt-1"></i></button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <hr>
</div>
