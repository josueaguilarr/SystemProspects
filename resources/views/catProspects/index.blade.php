@extends('layouts.home')

@section('title','Prospectos')

@section('content')

<div class="container bg-white shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mis prospectos</li>
        </ol>
    </nav>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-dark">
                <td class="text-center">Nombre del prospecto</td>
                <td class="text-center">Primer apellido</td>
                <td class="text-center">Segundo apellido</td>
                <td class="text-center">Estatus</td>
                <td class="text-center">Acciones</td>
            </thead>
            <tbody>
                <!-- Iterate our prospects -->
                @foreach($prospects as $prospect)
                <tr>
                    <td class="text-center">{{ $prospect->name }}</td>
                    <td class="text-center">{{ $prospect->surname }}</td>
                    <td class="text-center">{{ $prospect->second_surname }}</td>
                    <td class="text-center">
                        <!-- Status validation -->
                        @if($prospect->status == 1)
                        <span class="badge text-bg-warning">Enviado</span>
                        @elseif ($prospect->status == 2)
                        <span class="badge text-bg-success">Autorizado</span>
                        @else
                        <span class="badge text-bg-danger">Rechazado</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->role_id == 1)
                        <!-- Content for Promoter User -->
                        <a href="{{ route('prospects.show',['prospects' => $prospect->id]) }}" title="Ver"><button type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                        @else
                        <!-- Content for Evaluator User -->
                        <a href="{{ route('prospects.show',['prospects' => $prospect->id]) }}" title="Evaluar"><button type="button" class="btn btn-primary"><i class="fa-solid fa-file-pen"></i></button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                <!-- End Iterate -->
            </tbody>
        </table>
    </div>
</div>

@endsection