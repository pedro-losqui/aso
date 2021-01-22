<div wire:ignore.self class="modal fade editAsoF" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Alteração ASO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <livewire:aso.components.select-people />
                            @error('people_id')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <livewire:aso.components.select-employee />
                            @error('employee_id')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <h5 class="card-title">Atendimento</h5>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de atendimento</label>
                        <select wire:model='type' class="form-control custom-select">
                            <option value="">Selecione</option>
                            <option value="Admissional">Admissional</option>
                            <option value="Periódico">Periódico</option>
                            <option value="Retorno ao Trabalho">Retorno ao Trabalho</option>
                            <option value="Mudança de Função">Mudança de Função</option>
                            <option value="Demissional">Demissional</option>
                            <option value="Monitoração Pontual/Consulta">Monitoração Pontual/Consulta</option>
                            <option value="Complementares">Complementares</option>
                        </select>
                        @error('type')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Ambiente de trabalho</label>
                            <input type="text" wire:model='workplace' class="form-control">
                            @error('workplace')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Função</label>
                            <input type="text" wire:model='post' class="form-control">
                            @error('post')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <h5 class="card-title">Riscos</h5>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Físico</label>
                            <input type="text" wire:model='physicist' class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Químico</label>
                            <input type="text" wire:model='chemical' class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Biológico</label>
                            <input type="text" wire:model='biological' class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Ergonômico</label>
                            <input type="text" wire:model='ergonomic' class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Acidente</label>
                            <input type="text" wire:model='accident' class="form-control">
                        </div>
                    </div>

                    <br>
                    <h5 class="card-title">Exames</h5>

                    <div class="form-group">
                        <livewire:aso.components.exam-create />
                    </div>

                    <br>
                    <h5 class="card-title">Parecer</h5>

                    <div class="form-group">
                        <livewire:aso.components.select-conclusion />
                    </div>

                    <br>
                    <h5 class="card-title">Médico coordenador</h5>

                    <div class="form-group">
                        <livewire:aso.components.select-doctor />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" wire:click='update'>Atualizar</button>
            </div>
        </div>
    </div>
</div>
