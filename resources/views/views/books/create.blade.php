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

            <div class="btn-add__end">
            <a href="{{ route('books.index') }}" class="btn btn-primary" style="margin: 10px">{{"Назад"}}</a>
        </div>
                <div class="form-wrapper card form-bg">
                    <form class="form-horizontal" method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-lg-12 text-left form-main-title"
                           style="margin: 10px">{{"Добавить книгу"}}</label>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Автор книги"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="author" class="form-control input-lg" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Название книги"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="title" class="form-control input-lg" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title" for="catalog">{{"Каталог"}}</label>
                    <div class="col-lg-12">
                        <select name="catalog" class="form-control">
                            @foreach($catalogs as $catalog)
                                <option value="{{  $catalog->id  }}">{{$catalog->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Описание книги"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="description" class="form-control input-lg" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-7 text-left form-title">{{"Ссылка на скачивание"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="download_link" class="form-control input-lg" autocomplete="off">
                    </div>
                </div>
                <div class="form-group mr-0">
                    <label class="col-lg-6 text-left form-title">{{"Выбрать обложку"}}</label>
                    <div class="col-lg-12">
                        <input type="file" name="image" autocomplete="off">
                    </div>
                </div>
                <div class="form-group text-left col-lg-12">
                    <input type="submit" name="add" class="btn btn-primary input-lg"
                           value="Добавить"/>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection