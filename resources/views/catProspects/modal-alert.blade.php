<!-- Alert modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Estas apunto de salir...</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-start fw-bold">¿Realmente desea salir del modulo de registro?</p>
                <p class="text-start alert alert-danger fw-bold">Al aceptar, se perdera toda la informacion que no se haya guardado.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white fw-bold" data-bs-dismiss="modal">Cancelar</button>
                <a href="{{ route('home') }}">
                    <button type="button" class="btn btn-danger">Aceptar</button>
                </a>
            </div>
        </div>
    </div>
</div>