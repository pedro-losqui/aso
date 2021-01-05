<div wire:ignore.self class="modal fade editUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Alteração usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nome completo</label>
                            <input type="text" wire:model='name' class="form-control" placeholder="Nome completo">
                            @error('name')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Login</label>
                            <input type="text" wire:model='login' class="form-control" placeholder="Login">
                            @error('login')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Setor</label>
                        <input type="text" wire:model='post' class="form-control" placeholder="Setor">
                        @error('post')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model='reset' class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Alterar senha</label>
                    </div>
                    <hr>
                    @if($reset)
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Senha</label>
                                <input type="password" wire:model='password' class="form-control" placeholder="******">
                                @error('password')
                                    <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Confirmação de senha</label>
                                <input type="password" wire:model='password_confirm' class="form-control"
                                    placeholder="******">
                                @error('password_confirm')
                                    <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" wire:click='update'>Atualiza</button>
            </div>
        </div>
    </div>
</div>
