﻿@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="btn-add__end">
                @can('create-article')
                    @if(Auth::user()->surname!=null && Auth::user()->patronymic!=null &&
                    Auth::user()->full_name_of_organization!=null && Auth::user()->position!=null)
                        <a class="btn btn-primary" href="{{ route('create_article') }}"
                           style="margin: 10px">{{"Создать"}}</a>
                    @endif
                @endcan</div>
                <div class="bd-example" role="tabpanel" style="border: solid #f8f9fa;">
                    <h3>{{'Статьи'}}</h3>
                    <div class="flex-auto" style="padding: 30px;">
            @foreach($headings as $heading)
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading{{"$heading->id"}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{"$heading->id"}}" aria-expanded="true" aria-controls="collapse{{"$heading->id"}}">
                                        {{$heading->title}}
                                        {!! \App\article::where('heading','=',$heading->id)->where('published', true)->count()!!}

                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{"$heading->id"}}" class="collapse" aria-labelledby="heading{{"$heading->id"}}" data-parent="#accordionExample">
                                <div class="card-body">
                                    @foreach($articles as $article)
                                        @if($article->getHeading['id']==$heading->id)
                                            <div class="accordion" id="accordionExample">
                                                <div class="card border-secondary">
                                                    <div class="card-header " id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse{{ $article->id }}" aria-expanded="false"
                                                                    aria-controls="collapse{{ $article->id }}">
                                                                <?php $authors = $article->users ?>
                                                                @foreach($authors as $author)
                                                                    {{ $author->surname }} {{ $author->name }} {{ $author->patronymic }}
                                                                    .
                                                                @endforeach
                                                                "{{ $article->title}}"

                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse{{ $article->id }}" class="collapse"
                                                         aria-labelledby="headingThree"
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
                                                                       style="color: black"><span
                                                                                class="glyphicon glyphicon-download-alt"
                                                                                aria-hidden="true"> </span> </a></p>
                                                            @endif
                                                            @if ($article['file2'])  <p><b>{{"Формат PDF"}}</b>
                                                                <a
                                                                        href="{{ asset('articles/'.$article['file2']) }}"
                                                                        style="color: black"><span
                                                                            class="glyphicon glyphicon-download-alt"
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
                                                                    <a href="{{ route('edit_article', ['id' => $article->id]) }}"
                                                                       class="btn btn-primary" role="button"
                                                                    >{{"Редактировать"}}</a>
                                                                </div>
                                                                <div class="col">
                                                                    <form action="{{ route('drafts.delete', $article->id) }}"
                                                                          method="post">
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
                                        @endif
                                    @endforeach
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

