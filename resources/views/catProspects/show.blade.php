@extends('layouts.home')

@section('title','Ver prospecto')

@section('content')

<div class="container bg-white shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('prospects') }}" class="text-decoration-none">Mis prospectos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizando prospecto</li>
        </ol>
    </nav>

    <div class="container mb-5 mt-3">
        <h1 class="text-center fw-bold">Visualizando prospecto</h1>
    </div>

    <!-- Prospect information container -->
    <div class="row">

        <div class="col-md-4 mb-3 register-p">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" value="{{ $prospect->name }}" placeholder="Josue" required disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="surname" class="form-label">Primer apellido</label>
            <input type="text" class="form-control" id="surname" value="{{ $prospect->surname }}" placeholder="Aguilar" required disabled>
        </div>

        <div class="col-md-4 mb-3">
            <label for="second_surname" class="form-label">Segundo apellido</label>
            <input type="text" class="form-control" id="second_surname" value="{{ $prospect->second_surname }}" placeholder="Guerrero" disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="street" class="form-label">Calle</label>
            <input type="text" class="form-control" id="street" value="{{ $prospect->street }}" placeholder="Calle example" required disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="house_number" class="form-label">Número</label>
            <input type="text" class="form-control" id="house_number" value="{{ $prospect->house_number }}" placeholder="#123" required disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="colony" class="form-label">Colonia</label>
            <input type="text" class="form-control" id="colony" value="{{ $prospect->colony }}" placeholder="Colonia example" required disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="postal_code" class="form-label">Codigo postal</label>
            <input type="text" class="form-control" id="postal_code" value="{{ $prospect->postal_code }}" placeholder="00000" maxlength="5" pattern="[0-9]{5}" title="Solo debe contener 5 numeros" required disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="phone_number" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="phone_number" value="{{ $prospect->phone_number }}" placeholder="0001234567" maxlength="10" pattern="[0-9]{10}" title="Solo debe contener 10 numeros" required disabled>
        </div>

        <div class="col-md-4 mb-3 register-p">
            <label for="rfc" class="form-label">RFC (13 digitos)</label>
            <input type="text" class="form-control" id="rfc" value="{{ $prospect->rfc }}" placeholder="0000000000000" maxlength="13" pattern="[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}" required disabled>
        </div>

        <p class="fs-5 mt-2">Documentacion: </p>

        <div class="row mt-2 mb-5">
            <!-- Iterate our documents -->
            @foreach($documents as $document)
            <div class="d-flex justify-content-center align-items-center col-md-2">
                <a href="{{ route('downloadFile',['file'=>$document->document ]) }}" class="text-decoration-none">
                    <div class="" style="width: 8rem;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <p class="card-text"><i class="fa-solid fa-file-pdf fa-3x" style="color: red;"></i></p>
                            <p class="text-black text-center fw-bold m-2">{{ $document->name_document }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- End iterate -->
        </div>

        <!-- Content for Promoter User -->
        @if(Auth::user()->role_id == 1)
            <!-- Validate Prospect status -->
            @if($prospect->status == 1)
            <div class="mb-3">
                <label for="box" class="form-label m-1">Prospecto <span class="badge text-bg-warning">Enviado</span>.
                </label>
            </div>
            @elseif ($prospect->status == 2)
            <div class="mb-3">
                <label for="box" class="form-label m-1">Prospecto <span class="badge text-bg-success">Autorizado</span>.
                </label>
            </div>
            @else
            <div class="mb-3">
                <label for="box" class="form-label m-1">Prospecto <span class="badge text-bg-danger">Rechazado</span>: </label>
                <textarea class="form-control" id="box" rows="3" name="observations">{{ $prospect->observations }}</textarea>
            </div>
            @endif
            <!-- End validate -->

        <a href="{{ route('prospects') }}" class="text-decoration-none">
            <div class="d-grid gap-2">
                <button class="btn btn-danger">Salir</button>
            </div>
        </a>
        <!-- End content Promoter User -->
        @else
        <!-- Content for Evaluator User -->
        <p class="fs-5 mt-2">Evaluar: </p>

        <!-- Form for evaluate Prospect  -->
        <form action="{{ route('prospects.update',['prospects' => $prospect->id ]) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="row" id="containerObservations">
                <div class="form-check m-4 col-md-2" id="btnRadio2">
                    <input class="form-check-input" type="radio" name="status" value="2" id="btnRadio2" @if($prospect->status == 2) checked=checked @endif>
                    <label class="form-check-label" for="btnRadio2">
                        Autorizar
                    </label>
                </div>

                <div class="form-check m-4 col-md-2" id="btnRadio3">
                    <input class="form-check-input" type="radio" name="status" value="3" id="btnRadio3" @if($prospect->status == 3) checked=checked @endif>
                    <label class="form-check-label" for="btnRadio3">
                        Rechazar
                    </label>
                </div>
            </div>

            <div class="mb-3" id="observationBox">

            </div>

            <div class="row">
                <div class="col-md-6 d-grid gap-2"><button type="submit" class="btn btn-success mt-4 mb-3">Enviar</button></div>
                <div class="col-md-6 d-grid gap-2">
                    <button type="button" class="btn btn-danger mt-4 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Salir</button>
                </div>
            </div>
        </form>
        <!-- End Form -->
        <!-- End Content Evaluator User -->
        @endif
    </div>
    <!-- End Prospect information -->
</div>

<!-- Modal reference  -->
@include('catProspects.modal-alert')
@endsection


@section('js')
<script>
    // Reference buttons for throw function 'public/form.js'
    const authorizedProspectOption = document.getElementById("btnRadio2");
    authorizedProspectOption.addEventListener("click", deleteSectionObservations);

    const rejectedProspectOption = document.getElementById("btnRadio3");
    rejectedProspectOption.addEventListener("click", newSectionObservations);
</script>
@endsection