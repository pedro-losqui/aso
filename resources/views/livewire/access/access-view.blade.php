<div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Selecione o Perfil</h5>
                    <div class="form-group">
                        <select class="form-control custom-select" wire:model='select' id="exampleFormControlSelect1">
                            <option value="0">Perfil</option>
                            @foreach($role as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.alert')

    <div class="row">
        @if($permissions)
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        @for($i = 0; $i <= 17; $i++)
                            <h5 class="card-title">{{ $permission[$i] }}</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 1.5cm;">Ver</th>
                                        <th scope="col" style="width: 1.5cm;">Criar</th>
                                        <th scope="col" style="width: 1.5cm;">Editar</th>
                                        <th scope="col" style="width: 1.5cm;">Excluir</th>
                                        <th scope="col" style="width: 1.5cm;">Super</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($permissions as $item)
                                            @if(stristr($item->name, $permission[$i]))
                                                @if(in_array($item->name, $roleCheckedResponse))
                                                    <td style="opacity: 60%">
                                                        <button type="button" wire:click="revoke({{ $item->id }})"
                                                            class="btn btn-secondary btn-sm"><i
                                                                class="fa fa-window-close"></i></button>
                                                        &nbsp;&nbsp;{{ $item->name }}
                                                        &nbsp;
                                                        <i class="fa fa-check-double"></i>
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" wire:click="store({{ $item->id }})"
                                                            class="btn btn-primary btn-sm"><i
                                                                class="fa fa-check"></i></button>
                                                        &nbsp;&nbsp;{{ $item->name }}
                                                    </td>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endfor
                    </div>
                </div>
            </div>
        @else

        @endif
    </div>
</div>
