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
            <div class="btn-add__end">
                <a href="{{ route('list_articles') }}" class="btn btn-primary" style="margin: 10px">{{"Назад"}}</a>
            </div>
        <div class="form-wrapper card form-bg ">

            <form class="form-horizontal" role="form" method="post" action="{{ route('store_article') }} "
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-lg-12 text-left form-main-title">{{"Новая статья"}}</label>
                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-lg-6 text-left form-title">{{"Название"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="title" class="form-control input-lg" value="{{ old('title') }}"
                               autocomplete="off">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Соавторы (если нет соавторов, то поле заполнять не нужно)"}}</label>
                    <div class="col-lg-12">
                    <select class="authorselect form-control " name="authors[]" multiple="multiple" style="width: 100%">
                        @foreach($users as $id=>$user)
                            <option value="{{ $user->id }}">{{ $user->surname}} {{ $user->name}} {{ $user->patronymic}}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Рубрика"}}</label>
                    <div class="col-lg-12">
                    <select class="authorselect" name="heading" style="width: 100%">
                        @foreach($headings as $id=>$heading)
                            <option value="{{ $heading->id  }}">{{ $heading->title}} </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('annotation') ? ' has-error' : '' }}">
                    <label for="annotation" class="control-label col-lg-6 text-left form-title">{{"Аннотация"}}</label>
                    <div class="col-lg-12">
                    <div class="form-group">
                        <textarea name="annotation" id="annotation" cols="30" rows="10" class="form-control"
                                  required>{{ old('annotation') }}</textarea>
                        @if ($errors->has('annotation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('annotation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </div>
                </div>
                <div class="col-lg-12">
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                        {{"Загрузить Word"}}
                    </button>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                        {{"Загрузить Tex/PDF"}}
                    </button>
                </p>
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <div class="form-group">
                            <label class="col-lg-6 text-left form-title"
                                   style="color: black">{{"Загрузить Word"}}</label>
                            <div class="col-lg-12">
                                <input type="file" name="file3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                        <div class="form-group">
                            <label class="col-lg-6 text-left form-title"
                                   style="color: black">{{"Загрузить Tex"}}</label>
                            <div class="col-lg-12">
                                <input type="file" name="file1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6 text-left form-title "
                                   style="color: black">{{"Загрузить PDF"}}</label>
                            <div class="col-lg-12">
                                <input type="file" name="file2">
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-check">
                        <input type="hidden" value="0" name="access">
                        <input name="access" class="form-check-input" type="checkbox"
                               id="access" value="1" {{ old('access') ? 'checked' : '' }}>
                        <label class="form-check-label" for="access">
                            {{"Открыть доступ всем"}}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">
                            {{"Создать"}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
