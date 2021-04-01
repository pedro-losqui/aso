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
                            <input type="text" wire:model='name' class="form-control" placeholder="Permissão de acesso">
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

    <div class="row">
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Colaborador</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Colaborador'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Empresa</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Empresa'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Pessoa Física</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Pessoa-f'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Médico</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Medico'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Exames</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Exames'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Parecer</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Parecer'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Usuário</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Usuario'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>ASO</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Aso'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Histórico Aso</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Aso-h'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Liberação</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Liberar'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Alocar</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Alocar'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Histórico Exames</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Exame-h'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Registro</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Registro'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Histórico de Registro</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Registro-h'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Perfil</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Perfil'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Permissão</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Permissão'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-topics">
                <h3>Regra de Acesso</h3>
                <ul class="list-unstyled">
                    @forelse($permissions as $item)
                        @if(stristr($item->name, 'Regra-a'))
                            <li><a href="#">{{ $item->name }}</a></li>
                        @endif
                    @empty
                        <div class="alert alert-dark" role="alert">
                            Ops:( Nenhum registro foi encontrado!
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <br />
</div>
