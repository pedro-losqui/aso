<div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" wire:model='busca' class="form-control search-input"
                            placeholder="Buscar exame...">
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
                        <input type="checkbox" wire:model='input' wire:click='activeInput' class="custom-control-input"
                            id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Exame(s) alocado(s)</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model='output' wire:click='activeOutput'
                            class="custom-control-input" id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">Exame(s) liberado(s)</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    @if($input)
        <div class="row">
            @forelse($exams as $item)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled profile-about-list">
                                <li><i class="accordion-icon fas fa-user"></i><span>{{ $item->employee }}</span></li>
                                <li style="font-size: 10px"><i class="accordion-icon fas fa-building"></i><span><a
                                            href="#">{{ $item->company }}</a></span></li>
                                <li><i class="accordion-icon fas fa-toggle-off"></i><span><strong>Alocado por:
                                        </strong>{{ $item->user->name }}</span></li>
                                <li><i
                                        class="accordion-icon fas fa-calendar-alt"></i><span>{{ $item->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
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

    @if($output)
        <div class="row">
            @forelse($exams as $item)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled profile-about-list">
                                <li><i class="accordion-icon fas fa-user"></i><span>{{ $item->input->employee }}</span></li>
                                <li style="font-size: 10px"><i class="accordion-icon fas fa-building"></i><span><a
                                            href="#">{{ $item->input->company }}</a></span></li>
                                <li><i class="accordion-icon fas fa-toggle-on"></i><span><strong>Liberado por:
                                        </strong>{{ $item->user->name }}</span></li>
                                <li><i
                                        class="accordion-icon fas fa-calendar-alt"></i><span>{{ $item->created_at->format('d/m/Y') }}</span>
                                </li>
                                <hr>
                                <li><i class="accordion-icon fas fa-id-badge"></i><span class="mt-3"><strong>Retirado por:
                                </strong>{{ $item->responsible_name }}</span></li>
                                <li><i class="accordion-icon fas fa-id-card"></i><span class="mt-3"><strong>RG:
                                </strong>{{ $item->rg }}</span></li>
                            </ul>
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
