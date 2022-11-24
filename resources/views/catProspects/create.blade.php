@extends('layouts.home')

@section('title','Nuevo prospecto')

@section('content')

<div class="container bg-white shadow-lg p-3 mb-5 bg-body rounded">

    <div class="container mb-5 mt-3">
        <h1 class="text-center fw-bold">Nuevo prospecto</h1>
    </div>

    <!-- Form for create new prospect -->
    <form action="{{ route('prospects.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-4 mb-3 register-p">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Josue" required>
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="surname" class="form-label">Primer apellido</label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Aguilar" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="second_surname" class="form-label">Segundo apellido</label>
                <input type="text" class="form-control" id="second_surname" name="second_surname" placeholder="Guerrero">
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="street" class="form-label">Calle</label>
                <input type="text" class="form-control" id="street" name="street" placeholder="Calle example" required>
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="house_number" class="form-label">Número</label>
                <input type="text" class="form-control" id="house_number" name="house_number" placeholder="#123" required>
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="colony" class="form-label">Colonia</label>
                <input type="text" class="form-control" id="colony" name="colony" placeholder="Colonia example" required>
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="postal_code" class="form-label">Codigo postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="00000" maxlength="5" pattern="[0-9]{5}" title="Solo debe contener 5 numeros" required>
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="phone_number" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="0001234567" maxlength="10" pattern="[0-9]{10}" title="Solo debe contener 10 numeros" required>
            </div>

            <div class="col-md-4 mb-3 register-p">
                <label for="rfc" class="form-label">RFC (13 digitos)</label>
                <input type="text" class="form-control" id="rfc" name="rfc" placeholder="0000000000000" maxlength="13" pattern="[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}" required>
            </div>

            <details class="col-md-12">
                <summary class="mb-3">Documentos (+) </summary>

                <button type="button" class="btn btn-primary mb-3" id="btnAddNewFile"><i class="fa-solid fa-plus"></i></button>

                <div id="containerFiles">
                    <div class="row mb-2">
                        <div class="col-4">
                            <input type="text" class="form-control" name="name_document[]" placeholder="Nombre del documento" required>
                        </div>
                        <div class="col-8">
                            <input type="file" class="form-control" id="formFile" name="file[]" required>
                        </div>
                    </div>
                </div>
            </details>

            <div class="col-md-6 d-grid gap-2"><button type="submit" class="btn btn-success mt-4 mb-3">Enviar</button></div>
            <div class="col-md-6 d-grid gap-2">
                <button type="button" class="btn btn-danger mt-4 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Salir</button>
            </div>
        </div>
    </form>
    <!-- End form -->
</div>

<!-- Modal reference  -->
@include('catProspects.modal-alert')
@endsection


@section('js')
<script>
    // Reference button for throw function 'public/form.js'
    const btnAddNewFile = document.getElementById("btnAddNewFile");
    btnAddNewFile.addEventListener("click", newSectionFile);
</script>
@endsection