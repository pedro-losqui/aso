<div>
    
    <livewire:aso.actions.asoj-edit />

    <div class="row">
        <div class="col-sm">
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
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <a href="{{ route('asojcreate') }}"
                            class="btn btn-success btn-lg btn-block"><i class="fas fa-file-alt mr-2"></i>aso</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    <div class="row">
        @forelse($aso as $item)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">#ID: {{ $item->id }}</h5>
                        <ul class="list-unstyled profile-about-list">
                            <li><i class="fas fa-user-tag mr-3 mt-1"></i><span><strong>Colaborador:
                                    </strong>{{ $item->employee->name }}
                                    <br />
                                    <small><strong>CPF: </strong>{{ $item->employee->cpf }}</small></span>
                                    <hr>
                            </li>
                            <li>
                                <a href="{{ route('asojshow', $item->id) }}" target="_blank" class="btn btn-success">Imprimir</a>
                                <button type="button" data-toggle="modal" wire:click="edit('{{ $item->id }}')" data-target=".editAsoJ"  class="btn btn-secondary">Alterar</button>
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
</div>
