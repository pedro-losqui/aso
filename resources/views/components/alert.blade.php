@if(session()->has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if(session()->has('update'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                {{ session('update') }}
            </div>
        </div>
    </div>
@endif

@if(session()->has('delete'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        </div>
    </div>
@endif
