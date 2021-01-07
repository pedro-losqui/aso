<div>
    <label for="">Parecer médico</label>
    <select wire:model='conclusion_id' class="custom-select form-control">
        <option value=''>Selecione</option>
        @foreach($conclusions as $item)
            <option value="{{ $item->id }}">{{ $item->description }}</option>
        @endforeach
    </select>
</div>
