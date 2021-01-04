@extends('layouts.main')

@section('content')
<div class="content-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style-1">
            <li class="breadcrumb-item"><a href="#">Gesto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Procedimentos</li>
        </ol>
    </nav>
    <h1 class="page-title">Procedimentos</h1>
</div>

<livewire:exam.exam-view />

@endsection