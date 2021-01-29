<div>
    @include('livewire.input.modal.create')
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
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <button type="button" wire:click='default' data-toggle="modal" data-target=".allocationExam"
                            class="btn btn-success btn-lg btn-block"><i class="fas fa-file-download mr-2"></i> Alocar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Listagem de exames alocados:  <span class="badge badge-pill badge-success"><strong>{{ $inputs->count() }}</strong></span> registro(s)</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Colaborador</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($inputs as $item)
                                    <tr>
                                        <td>
                                            {{ $item->employee }} <br/>
                                            <small><strong>Atendimento: </strong>{{ $item->type }}</small>
                                        </td>
                                        <td>
                                            {{ $item->company }} <br/>
                                            <small><strong>Alocação: </strong><span class="badge badge-danger">{{ $item->allocation }}</span></small>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">{{ $item->status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-dark" role="alert">
                                        Ops:( Nenhum registro foi encontrado!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>