<div wire:ignore.self class="modal fade createAsoJ" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Registro empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    @include('components.alert')
                    <br />

                    <div class="form-group">
                        <livewire:aso.components.select-company />
                        @error('company_id')
                            <div class="form-group">
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <livewire:aso.components.select-employee />
                        @error('employee_id')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>

                    <br />

                    <div class="form-group">
                        <label for="">Tipo de atendimento</label>
                        <select wire:model='type' class="custom-select form-control">
                            <option value=''>Selecione</option>
                            <option value="Admissional">Admissional</option>
                            <option value="Periódico">Periódico</option>
                            <option value="Retorno ao Trabalho">Retorno ao Trabalho</option>
                            <option value="Demissional">Demissional</option>
                            <option value="Consulta">Consulta</option>
                            <option value="Complementares">Complementares</option>
                        </select>
                        @error('type')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Ambiente de trabalho</label>
                            <input type="text" wire:model='workplace' class="form-control"
                                placeholder="Ambiente de Trabalho">
                            @error('workplace')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Função</label>
                            <input type="text" id="name" wire:model='post' class="form-control" placeholder="Função">
                            @error('post')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <br />

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Risco físico</label>
                            <input type="text" wire:model='physicist' class="form-control" placeholder="Risco físico">
                            @error('physicist')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Risco químico</label>
                            <input type="text" wire:model='chemical' class="form-control" placeholder="Risco químico">
                            @error('chemical')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Risco biológico</label>
                            <input type="text" wire:model='biological' class="form-control"
                                placeholder="Risco biológico">
                            @error('biological')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Risco ergonômico</label>
                            <input type="text" wire:model='ergonomic' class="form-control"
                                placeholder="Risco ergonômico">
                            @error('ergonomic')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Risco acidente</label>
                            <input type="text" wire:model='accident' class="form-control" placeholder="Risco acidente">
                            @error('accident')
                                <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <br />

                    <div class="form-group">
                        <livewire:aso.components.select-conclusion />
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
