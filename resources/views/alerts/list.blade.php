@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Alertas</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('alerts.form')}}" class="btn btn-sm btn-primary">+ Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Activo</th>
                                <th scope="col" class="text-center">Agregado</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alerts as $data)
                            <tr>
                                <th scope="row">
                                    {{ $data->name }}
                                </th>
                                <td class="text-center">
                                    {{ $data->email }}
                                </td>
                                <td class="text-center">
                                    @if ($data->enabled)
                                    <span class="badge badge-success">SÍ</span>
                                    @else
                                    <span class="badge badge-warning">NO</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $data->created_at }}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('alerts.change', ['id' => $data->id]) }}">Habilitar/Deshabilitar</a>
                                            <a class="dropdown-item" href="{{ route('alerts.delete', ['id' => $data->id]) }}">Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection