<div>
    <label for="">Médico coordenador</label>
    <select wire:model='doctor_id' class="custom-select form-control">
        <option value=''>Selecione</option>
        @foreach($doctors as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>

