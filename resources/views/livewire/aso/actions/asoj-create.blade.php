<div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <livewire:aso.components.company-create />
                    <livewire:aso.components.employee-create />
                    <h5 class="card-title">Dados inicias</h5>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-11">
                                <livewire:aso.components.select-company />
                                @error('company_id')
                                    <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <label>Cadastro</label>
                                <button type="button" data-toggle="modal" data-target=".createCompanyAso"
                                    class="btn btn-info btn-lg btn-block" style="height: 41px"><i
                                        class="fas fa-plus-square"></i></button>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-11">
                                <livewire:aso.components.select-employee />
                                @error('employee_id')
                                    <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <label>Cadastro</label>
                                <button type="button" data-toggle="modal" data-target=".createEmployeeAso"
                                    class="btn btn-info btn-lg btn-block" style="height: 41px"><i
                                        class="fas fa-plus-square"></i></button>
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

                        <button type="button" wire:click='store' class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
