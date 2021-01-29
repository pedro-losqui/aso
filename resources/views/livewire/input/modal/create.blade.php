<div wire:ignore.self class="modal fade allocationExam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Alocação de exame</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="">Atendimento</label>
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
                            <livewire:input.components.select-company />
                            @error('company')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Colaborador</label>
                            <input type="text" id="name" wire:model='employee' class="form-control"
                                placeholder="Colaborador">
                            @error('employee')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alocação</label>
                        <input type="text" wire:model='allocation' class="form-control" data-mask="0-A">
                        @error('allocation')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" wire:click='store'>Salvar</button>
            </div>
        </div>
    </div>
</div>
