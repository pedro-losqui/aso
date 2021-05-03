<div>
    <div class="row">
        <div class="col-sm">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100000"></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">Total de ASO<span class="info-stats">{{ $asoTotal }}</span></h4>
                        <small>Total</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 75%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">ASO Gerado Por: <small><strong>{{ Auth::user()->name }}</strong></small><span class="info-stats">{{ $asoUsuario }}</span></h4>
                        <small>Total</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                            aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ $atendimentos >= 75 ? '75' : $atendimentos }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">Atendimentos<span class="info-stats">{{ $atendimentos }}</span></h4>
                        <small>{{ date('d/m/Y') }}</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{ $senhas >= 75 ? '75' : $senhas }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">Senhas<span class="info-stats">{{ $senhas }}</span></h4>
                        <small>{{ date('d/m/Y') }}</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/>
    <br/>
    <br/>

    <div class="row mt-4">
        <div style="text-align: center" class="col-sm">
            <img style="opacity: 0.3;" src="{{ asset('assets/images/login.png') }}" width="180px">
        </div>
    </div>

</div>
