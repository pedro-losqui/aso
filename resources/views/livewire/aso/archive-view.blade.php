<div>
    <livewire:aso.actions.asof-edit />
    <livewire:aso.actions.asoj-edit />

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" wire:model='busca' class="form-control search-input"
                            placeholder="Buscar aso...">
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
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="date" wire:model='start' wire:model='busca' class="form-control search-input">
                        <input type="date" wire:model='end' wire:model='busca' class="form-control search-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model='asoj' wire:click='activeAsoJ' class="custom-control-input"
                            id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Aso pessoa jurídica</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model='asof' wire:click='activeAsoF' class="custom-control-input"
                            id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">Aso pessoa física</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    @if($asoj)
        <div class="row">
            @forelse($aso as $item)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ASO #ID: {{ $item->id }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i
                                                class="fas fa-user-tag mr-2"></i><span>{{ $item->employee->name }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i
                                                class="fas fa-id-card mr-2"></i><span>{{ $item->employee->cpf }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i
                                                class="fas fa-calendar-alt mr-2"></i><span>{{ $item->created_at->format('d/m/Y') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('asojshow', $item->id) }}"
                                                target="_blank" class="btn btn-secondary">Imprimir</a>
                                            <button type="button" wire:click="editJ('{{ $item->id }}')" 
                                                class="btn btn-primary">Editar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-dark" role="alert">
                        Ops:( Nenhum registro foi encontrado!
                    </div>
                </div>
            @endforelse
        </div>
    @endif

    @if($asof)
        <div class="row">
            @forelse($aso as $item)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ASO #ID: {{ $item->id }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i
                                                class="fas fa-user-tag mr-2"></i><span>{{ $item->employee->name }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i
                                                class="fas fa-id-card mr-2"></i><span>{{ $item->employee->cpf }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i
                                                class="fas fa-calendar-alt mr-2"></i><span>{{ $item->created_at->format('d/m/Y') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('asofshow', $item->id) }}"
                                                target="_blank" class="btn btn-secondary">Imprimir</a>
                                            <button type="button" wire:click="editF('{{ $item->id }}')"
                                                class="btn btn-primary">Editar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-dark" role="alert">
                        Ops:( Nenhum registro foi encontrado!
                    </div>
                </div>
            @endforelse
        </div>
    @endif
</div>
