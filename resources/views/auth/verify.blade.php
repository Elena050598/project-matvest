@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Проверьте Вашу почту') }}</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('На ваш электронный адрес была отправлена новая ссылка для подтверждения.') }}
                            </div>
                        @endif
                        {{ __('Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}
                        {{ __('Если Вы не получили email ') }}, <a
                                href="{{ route('verification.resend') }}">{{ __('нажмите здесь') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
