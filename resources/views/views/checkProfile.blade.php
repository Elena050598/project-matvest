@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron" id="jumbotron">
                <h3>{{Auth::user()->name}}!</h3>
                <p class="lead">{{'Теперь, когда анкета заполнена, Вам стал доступен раздел "Статьи",
                где Вы можете отправить свою статью в редакцию или ознакомиться с работами других авторов'}}
                </p>
                <hr class="my-4">
                <p class="lead">
                <div class="row">
                    <div class="col">
                    <a class="btn btn-primary btn-lg" href="{{ route('create_article') }}"
                       role="button">{{"Создать свою статью"}}</a></div>
                    <div class="col">
                    <a class="btn btn-primary btn-lg" href="{{ url('/art') }}"
                       role="button">{{"Посмотреть статьи других авторов"}}</a></div>
                </div>
                </p>
            </div>
        </div>
    </div>
@endsection