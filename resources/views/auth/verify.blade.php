@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar tu dirección de correo eletrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificación ha sido enviado a tu correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, porfavor verifica el link en tu correo electrónico.') }}
                    {{ __('En caso de que no hayas recibido el correo electrónico.') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
