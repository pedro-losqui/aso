<div>
    @include('livewire.output.modal.create')

    @include('components.alert')

    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" wire:model='busca' class="form-control search-input"
                            placeholder="Buscar exames alocados...">
                        @if($busca)
                            <div class="input-group-append">
                                <button class="btn btn-primary" wire:click='clear' type="button" id="button-addon1"><i
                                        class="fas fa-times-circle"></i></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <button type="button" data-toggle="modal" data-target=".releaseExam"
                            class="btn btn-success btn-lg btn-block"><i class="fas fa-file-upload mr-2"></i>
                            Liberar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <button type="button" wire:click='unselect' class="btn btn-primary btn-lg btn-block"><i class="fas fa-window-close mr-2"></i>Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($input as $key => $value)
            <div class="col-3">
                <div @if(in_array($value->id, $input_id)) class="card" style="opacity: 35%" @else class="card" @endif>
                    <div class="card-body">
                        <h5 class="card-title">Empresa:</h5>
                        <p class="card-text" style="margin-top: -1.2rem">{{ $value->company }}</p>
                        <h5 class="card-title">Colaborador:</h5>
                        <p class="card-text" style="margin-top: -1.2rem">{{ $value->employee }}</p>
                        <button wire:click="select('{{ $value->id }}')" class="btn btn-info"><i
                                class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
