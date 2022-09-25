@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<meta http-equiv="refresh" content="10" > 

<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Fecha y Hora</th>
                                <th scope="col" class="text-center">Artefacto</th>
                                <th scope="col" class="text-center">Descripción</th>
                                <th scope="col" class="text-center">RansomwareML Scoring</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $data)
                            <tr>
                                <th scope="row">
                                    {{ $data["SCORE_DATE"] }}
                                </th>
                                <td class="text-center">
                                    {{ $data["ARTEFACTO"] }}
                                </td>
                                <td class="text-center">
                                    {{ $data["DESCRIPTION"] }}
                                </td>
                                <td class="text-center">
                                    {{ $data["SCORE"] }}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="">Habilitar/Deshabilitar</a>
                                            <a class="dropdown-item" href="">Eliminar</a>
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