@extends('layouts.login')

@section('title','Iniciar sesión')

@section('content')

<section id="login">
    <article>
        <div class="container w-100 mt-5 p-5" style="height: 88vh;">

            <div class="container w-75 p-5 shadow-lg p-3 mb-5 bg-body rounded c-login" style="height: 80vh;">
                <h1>Inicio de sesión</h1>
                <p class="text-muted mb-5">
                    Ingresa tus credenciales para acceder al sistema
                </p>

                <!-- Form for User Login -->
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="mb-4 login">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-4 login">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mt-4 mb-3">Iniciar sesión</button>
                    </div>

                    <!-- Provisional Users Credencials-->
                    <p class="text-muted fs-5">Credenciales provisionales</p>
                    <p class="text-muted fs-6 mb-0">Promotor: josueaguilar, promotorcon</p>
                    <p class="text-muted fs-6 mb-0">Evaluador: yahirguerrero, evaluadorcon</p>
                    <!-- End Credencials-->

                </form>
                <!-- End Form -->
            </div>
        </div>
    </article>
</section>

@endsection