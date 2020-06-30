@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="btn-add__end"><a href="{{ route('index') }}" class="btn btn-primary"
                                     style="margin: 10px">{{"Назад"}}</a></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактирование главной страницы') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <Form action="/redactor" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="mission">{{"Миссия"}}</label>
                                <textarea name="mission" id="mission" cols="30" rows="10"
                                          class="form-control">{{ old('mission')??$redactor->mission }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="target">{{"Цель"}}</label>
                                <textarea name="target" id="target" cols="30" rows="10"
                                          class="form-control">{{ old('target')??$redactor->target}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="tasks">{{"Задачи"}}</label>
                                <textarea name="tasks" id="tasks" cols="30" rows="10"
                                          class="form-control">{{ old('tasks')??$redactor->tasks}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="titleindex">{{"Заголовок"}}</label>
                                <textarea name="titleindex" id="titleindex" cols="30" rows="10"
                                          class="form-control">{{ old('titleindex')??$redactor->titleindex}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="headings">{{"Рубрики"}}</label>
                                <textarea name="headings" id="headings" cols="30" rows="10"
                                          class="form-control">{{ old('headings')??$redactor->headings}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="is_necessary">{{"Для публикации статьи необходимо"}}</label>
                                <textarea name="is_necessary" id="is_necessary" cols="30" rows="10"
                                          class="form-control">{{ old('is_necessary')??$redactor->is_necessary}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="attention">{{"Внимание"}}</label>
                                <textarea name="attention" id="attention" cols="30" rows="10"
                                          class="form-control">{{ old('attention')??$redactor->attention}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="infa">{{"Информация для авторов"}}</label>
                                <textarea name="infa" id="infa" cols="30" rows="10"
                                          class="form-control">{{ old('infa')??$redactor->infa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="infa">{{"Образец оформления статьи"}}</label>
                                <div class="form-group mr-0">
                                    <label class="col-lg-6 text-left form-title">{{"Загрузить файл"}}</label>
                                    <div class="col-lg-12">
                                        <div><a href="{{ route('destroyModel', [$redactor->id,'file'])}}"
                                                style="color: black">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"/>
                                                {{"Удалить прежний вариант"}}
                                            </a></div>
                                        <div><input type="file" name="file" autocomplete="off"></div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">{{"Отправить"}}</button>
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
