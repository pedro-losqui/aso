<div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" wire:model='busca' class="form-control search-input"
                            placeholder="Buscar registro...">
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
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md">
                        <label for="">Empresa</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" wire:model='company' class="form-control" placeholder="Razão social">
                        </div>
                        @error('company')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md">
                        <label for="">Colaborador</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" wire:model='employee' class="form-control" placeholder="Nome completo">
                        </div>
                        @error('employee')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md">
                        <label for="">Senha</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                            </div>
                            <input type="text" wire:model='ticket' class="form-control" data-mask="000"
                                placeholder="000">
                        </div>
                        @error('ticket')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body" style="height: 130.5px">
                    <div class="form-group col-md">
                        <div class="input-group">
                            <button style="margin-top: 19px;" wire:click='store'
                                class="btn btn-primary btn-lg btn-block">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    <br />

    <div class="row">
        @forelse($records as $item)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg m-b-md">
                            <p class="bold" style="font-size: 13px"><strong>Senha: </strong>{{ $item->ticket }}</p>
                            <hr style="border-top: 2px dotted #ccc">
                            <span><i class="fas fa-user mr-2"></i>{{ $item->employee }}</span><br>
                            <span><i class="fas fa-building mr-2"></i>{{ $item->company }}</span><br>
                            <hr style="border-top: 2px dotted #ccc">
                        </div>
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
</div>
