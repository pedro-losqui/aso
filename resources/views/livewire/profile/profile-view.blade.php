<div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-md">
                        <label for="">Perfil</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                            </div>
                            <input type="text" wire:model='name' class="form-control" placeholder="Perfil de acesso">
                        </div>
                        @error('name')
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
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 2cm">#</th>
                                <th scope="col">Perfil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($profiles as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
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
