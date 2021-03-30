@extends('layouts.error')

@section('content')
<div class="error-404">
    <div class="error-bg"></div>
    <div class="error-info">
        <div class="error-text">
            <div class="error-header">
                <h3>401</h3>
            </div>
            <div class="error-body">
                <p>Ooopss... Você não tem autorização.<br></p>
            </div>
            <div class="error-footer">
                <p>{{ date('Y') }} &copy; Gesto </span><span
                    class="badge badge-info">v3.0.0</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
