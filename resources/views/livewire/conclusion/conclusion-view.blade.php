<div>

    @include('livewire.conclusion.modal.create')
    @include('livewire.conclusion.modal.edit')

    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" wire:model='busca' class="form-control search-input"
                            placeholder="Buscar parecer...">
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
                        <button type="button" wire:click='default' data-toggle="modal" data-target=".createConclusion"
                            class="btn btn-success btn-lg btn-block"><i class="fas fa-user mr-2"></i> Adicionar</button>
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
                    <h5 class="card-title">Listagem de parecer médico: <span
                            class="badge badge-pill badge-success"><strong>{{ $conclusions->count() }}</strong></span>
                        registro(s)</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 2cm">#ID</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col" style="width: 3cm">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($conclusions as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <button type="button" wire:click='edit({{ $item->id }})'
                                                data-toggle="modal" data-target=".editConclusion"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pen-alt"></i></button>
                                            <button type="button" wire:click='delete({{ $item->id }})'
                                                class="btn btn-secondary btn-sm"><i
                                                    class="fas fa-trash-alt"></i></button>
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
