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
                        <button type="button" wire:click='unselect' class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-window-close mr-2"></i>Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Exames alocados</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1rem">#</th>
                                <th scope="col">Dados</th>
                                <th scope="col" style="width: 13rem">Alocação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($input as $key => $value)
                                <tr @if(in_array($value->id, $input_id)) style="opacity: 35%" @else @endif>
                                    <th scope="row">
                                        <button wire:click="select('{{ $value->id }}')" class="btn btn-success"><i
                                        class="fas fa-check-circle"></i></button>
                                    </th>
                                    <td>
                                        <small style="font-size: 12px"><strong>Colaborador(a): </strong>{{ $value->employee  }}</small><br/>
                                        <small style="font-size: 12px"><strong>Empresa.............: </strong>{{ $value->company }}</small>
                                    </td>
                                    <td>
                                        <small style="font-size: 13px"><strong>Alocado em: </strong><span class="badge badge-dark">{{ $value->allocation }}</span></small>
                                        @if(in_array($value->id, $input_id)) <i class="fas fa-check"></i> @else @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
