@extends('layouts.main')

@section('content')
<div class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style-1">
            <li class="breadcrumb-item"><a href="#">Gesto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Parecer Médico</li>
        </ol>
    </nav>
    <h1 class="page-title">Parecer Médico</h1>
</div>

<livewire:conclusion.conclusion-view />

@endsection
