<div>

    @include('livewire.employee.modal.create')

    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" wire:model='busca' class="form-control search-input"
                            placeholder="Busca por colaborador...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <button type="button" data-toggle="modal" data-target=".createEmployee"
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
                    <h5 class="card-title">Last Orders</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 2cm">#ID</th>
                                    <th scope="col">Colaborador</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col" style="width: 3cm">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->cpf }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-pen-alt"></i></button>
                                            <button type="button" wire:click='delete({{ $item->id }})' class="btn btn-secondary btn-sm"><i
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