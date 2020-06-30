@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron">
                <h1 class="display-4"> {{"Информация для авторов."}}</h1>
                <p class="lead">{{"Дорогие коллеги!"}}</p>
                <hr class="my-4">
                <p>{!!\App\redactor::all()[0]->infa!!}</p>
            </div>
        </div>
    </div>
    </div>
@endsection