<div>
    <div class="row">
        <div class="col-sm-8">
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
    </div>

    <br/>

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