@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron" id="jumbotron">
                <h3> {{"Добро пожаловать, "}}{{Auth::user()->name}}!</h3>
                <p class="lead">{{"Поздравляем! Теперь Вы зарегистрированный пользователь нашего сайта "}}<a
                            href="{{url("/")}}"
                            style="color: rgba(0, 58, 255, 0.79);">{{"МатВест"}}</a>
                    {{". Теперь у вас больше возможностей пользования сайтом!"}}
                </p>
                <hr class="my-4">
                <p>{{"Прежде чем приступать к публикации статей, рекомендуем заполнить Вашу анкету."}}</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ url('/profile') }}"
                       role="button">{{"Заполнить анкету"}}</a>
                </p>
            </div>
        </div>
    </div>
@endsection
