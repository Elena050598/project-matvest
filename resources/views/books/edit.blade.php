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
                    <form class="form-horizontal" method="post" action="{{ route('books.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label class="col-lg-12 text-left form-main-title">{{"Редактировать книгу"}}</label>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Автор книги"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="author" class="form-control input-lg" value="{{ $data->author }}"
                               autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Название книги"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="title" class="form-control input-lg" value="{{ $data->title }}"
                               autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title" for="catalog">{{"Каталог"}}</label>
                    <div class="col-lg-12">
                        <select name="catalog" class="custom-select mr-sm-2">
                            @foreach($catalogs as $catalog)
                                <option value="{{  $catalog->id  }}" {{ ($data->catalog == $catalog->id)?'selected':''}}
                                >{{$catalog->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 text-left form-title">{{"Описание книги"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="description" class="form-control input-lg"
                               value="{{ $data->description }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-7 text-left form-title">{{"Ссылка на скачивание"}}</label>
                    <div class="col-lg-12">
                        <input type="text" name="download_link" class="form-control input-lg"
                               value="{{ $data->download_link }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group mr-0">
                    <label class="col-lg-6 text-left form-title">{{"Выбрать обложку"}}</label>
                    <div class="col-lg-12">
                        <input type="file" name="image" value="{{ URL::to('/') }}/images/{{ $data->image }}"
                               class="img-thumbnail" width="75">
                        <input type="" name="hidden_image" value="{{ $data->image }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 text-left">
                        <input type="submit" class="btn btn-primary input-lg" name="edit"
                               value="Редактировать">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection