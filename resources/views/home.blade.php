@extends('layouts.home')

@section('title','Dashboard')

@section('content')

<div class="container mb-5">
    <h1 class="text-center fw-bold">Bienvenido {{ Auth::user()->role->name }}: {{ Auth::user()->name }}
        <i class="fa-regular fa-circle-check" style="color: green;"></i>
    </h1>
</div>

@if( Auth::user()->role->name == 'Promotor')
<!-- Content for Promoter User -->
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 300px; width: 100%;" id="pattern-cards">
        <div class="card-home">
            <a href="{{ route('prospects.create') }}" class="text-decoration-none">
                <div class="card bg-success shadow-lg rounded" style="width: 15rem;">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <p class="card-text"><i class="fa-solid fa-file-circle-plus fa-5x" style="color: white;"></i></p>
                        <p class="fs-5 text-white text-center fw-bold">Agregar prospecto</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-home">
            <a href="{{ route('prospects') }}" class="text-decoration-none">
                <div class="card bg-primary shadow-lg rounded" style="width: 15rem;">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <p class="card-text d-inline"><i class="fa-solid fa-eye fa-5x" style="color: white;"></i></p>
                        <p class="fs-5 text-white text-center fw-bold">Ver mis prospectos</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@else
<!-- Content for Evaluator User -->
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 300px; width: 100%;" id="pattern-cards">
        <div class="card-home">
            <a href="{{ route('prospects') }}" class="text-decoration-none">
                <div class="card bg-warning shadow-lg rounded" style="width: 15rem;">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <p class="card-text d-inline"><i class="fa-solid fa-file-signature fa-5x" style="color: white;"></i></p>
                        <p class="fs-5 text-white text-center fw-bold">Evaluar prospectos</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endif

@endsection