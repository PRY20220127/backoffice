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
                <div class="card-body">
                    <div class="container">
                        <form method="post" action="{{ route('alerts.insert') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">{{ __('Nombres') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control " placeholder="{{ __('Nombres') }}" required autofocus>

                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control" placeholder="{{ __('Email') }}" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection