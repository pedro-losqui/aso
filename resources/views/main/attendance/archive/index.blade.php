@extends('layouts.main')

@section('content')
<div class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style-1">
            <li class="breadcrumb-item"><a href="#">Gesto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registo</li>
        </ol>
    </nav>
    <h1 class="page-title">Registo</h1>
</div>

<livewire:attendance.attendence-archive />

@endsection