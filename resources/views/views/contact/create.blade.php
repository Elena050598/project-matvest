@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Обратная связь') }}</div>
                    <div class="card-body">
                        <Form action="/contact" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">{{"Ваше Имя"}}</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                       autocomplete="off">
                                <div>{{ $errors->first('name') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="name">{{"Ваш Email"}}</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                       autocomplete="off">
                                <div>{{ $errors->first('email') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="name">{{"Ваше сообщение"}}</label>
                                <textarea name="message" id="message" cols="30" rows="10"
                                          class="form-control">{{ old('message') }}</textarea>
                                <div>{{ $errors->first('message') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="file">{{"Прикрепить файл"}}</label>
                                <input type="file" class="form-control-file @error('file') is-invalid @enderror"
                                       id="file">
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

