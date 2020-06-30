@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <div class="btn-add__end"><a href="{{ route('list_articles') }}" class="btn btn-primary"
                                             style="margin: 10px">{{"Назад"}}</a>
                    @can('create-article')
                        @if(Auth::user()->surname!=null && Auth::user()->patronymic!=null &&
                        Auth::user()->full_name_of_organization!=null && Auth::user()->position!=null)
                            <a href="{{ route('create_article') }}" class="btn btn-primary"
                               style="margin: 10px">{{"Создать"}}</a>
                        @endif
                    @endcan</div>
            <div class="bd-example" role="tabpanel" style="border: solid #f8f9fa;">
                <h3>{{"Мои статьи"}}</h3>
                <div class="flex-auto" style="padding: 30px;">
                    @foreach($articles as $article)
                        <div class="accordion" id="accordionExample">
                            <div class="card border-secondary">
                                <div class="card-header " id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapse{{ $article->id }}" aria-expanded="false"
                                                aria-controls="collapse{{ $article->id }}">
                                            <?php $authors = $article->users ?>
                                            @foreach($authors as $author)
                                                {{ $author->surname }} {{ $author->name }} {{ $author->patronymic }}.
                                            @endforeach
                                            "{{ $article->title}}"
                                                <div class="text-left text-primary" style="color: #0a6fbf; ">@if($article->published){{'Опубликована'}}
                                                @else {{'Не опубликована'}}
                                                @endif</div>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $article->id }}" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body text-secondary">
                                        <p><b>{{"Рубрика:"}}</b>
                                            {{ $article->getHeading['title']}}.</p>
                                        <p><b>{{"Аннотация:"}}</b>
                                            {{ $article->annotation }}.</p>
                                        <p>
                                        @if ($article['file1'])
                                            <p><b>{{"Формат Tex"}}</b>
                                                <a href="{{ asset('articles/'.$article['file1']) }}"
                                                   style="color: black"><span class="glyphicon glyphicon-download-alt"
                                                                              aria-hidden="true"> </span> </a></p>
                                        @endif
                                        @if ($article['file2'])  <p><b>{{"Формат PDF"}}</b>
                                            <a
                                                    href="{{ asset('articles/'.$article['file2']) }}"
                                                    style="color: black"><span class="glyphicon glyphicon-download-alt"
                                                                               aria-hidden="true"></span></a></p>
                                        @endif
                                        @if ($article['file3'])
                                            <p><b>{{"Формат Word"}}</b>
                                                <a
                                                        href="{{ asset('articles/'.$article['file3']) }}"
                                                        style="color: black"><span
                                                            class="glyphicon glyphicon-download-alt"
                                                            aria-hidden="true"></span> </a></p>
                                        @endif
                                        <div class="row">
                                            <div class="col">
                                                @can('publish-article')
                                                    <a href="{{ route('publish_article', ['id' => $article->id]) }}"
                                                       class="btn btn-primary" role="button"
                                                       >{{"Опубликовать"}}</a>
                                                @endcan
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('edit_article', ['id' => $article->id]) }}"
                                                   class="btn btn-primary" role="button"
                                                   >{{"Редактировать"}}</a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('drafts.delete', $article->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">{{"Удалить"}}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="pgn-down">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection

