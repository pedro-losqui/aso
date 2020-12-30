<div wire:ignore.self class="modal fade editEmployee" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Alteração colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">CPF</label>
                            <input type="text" wire:model='cpf' class="form-control" data-mask="000.000.000-00" placeholder="000.000.000-00">
                            @error('cpf')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nome Completo</label>
                            <input type="text" id="name" wire:model='name' class="form-control" placeholder="Nome">
                            @error('name')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="date" wire:model='born_date' class="form-control">
                        @error('born_date')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Genero</label>
                        <select wire:model='gender' class="form-control custom-select">
                            <option>Selecione...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                        @error('gender')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" wire:click='update'>Atualiza</button>
            </div>
        </div>
    </div>
</div>
