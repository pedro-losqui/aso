<div wire:ignore.self class="modal fade createCompany" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <div class="form-group">
                        <label for="">Razão social</label>
                        <input type="text" wire:model='name' class="form-control" placeholder="Nome">
                        @error('name')
                            <span class="badge badge-danger mt-2" style="font-size: 11px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">CNPJ</label>
                        <input type="text" wire:model='cnpj' class="form-control" data-mask="00.000.000/0000-00" placeholder="00.000.000/0000-00" >
                        @error('cnpj')
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
