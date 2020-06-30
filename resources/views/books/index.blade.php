@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">

            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('catalogs.index') }}" class="btn btn-primary" style="margin: 10px">{{"Назад"}}</a>
            </div>
            @if (Auth::user() && Auth::user()->inRole('is_admin'))
                <div class="btn-add__end">
                    <a href="{{ route('books.create') }}" class="btn btn-primary"
                       style="margin: 10px;">{{"Добавить книгу"}}</a>
                </div>
            @endif

            {!! $books->links() !!}
            <div class="bd-example" role="tabpanel" style="border: solid #f8f9fa;">
                <h3>{{"Книги"}}</h3>
                <div class="flex-auto" style="padding: 30px;">
                    @foreach($books as $row)
                        <div class="accordion" id="accordionExample">
                            <div class="card border-secondary">
                                <div class="card-header " id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapse{{ $row->id }}" aria-expanded="false"
                                                aria-controls="collapse{{ $row->id }}">
                                            {{ $row->author }}
                                            "{{ $row->title }}"
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $row->id }}" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body text-secondary">
                                        <div class="media">
                                            <img src="{{ URL::to('/') }}/images/{{ $row->image }}"
                                                 width="150"
                                                 alt="book">
                                            <div class="media-body">{{ $row->description }}.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="flex-item">
                                                <a href="{{ asset($row->download_link) }}" class="btn btn-primary"
                                                   style="margin: 10px;">{{"Скачать"}}</a>
                                            </div>
                                        </div>
                                        @if (Auth::user() && Auth::user()->inRole('is_admin'))
                                            <div class="col">
                                                <form class="form-inline" method="post">
                                                    <div class="flex-item">
                                                        <a href="{{ route('books.edit', $row->id) }}"
                                                           class="btn btn-warning"
                                                           style="margin: 10px">{{"Редактировать"}}</a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('books.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                            style="margin: 10px">{{"Удалить"}}
                                                    </button>
                                                </form>
                                            </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="pgn-down">
            {!!$books->links() !!}
        </div>
    </div>
    </div>
    </div>
@endsection
