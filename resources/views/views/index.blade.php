@extends('layouts.app')
@section('content')
    <header class="masthead text-white text-center" id="nameSite">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="alert col-xl-9 mx-auto" style="background: rgba(46,77,105,0.55)">
                    <h1  class="mb-5 ">{!!\App\redactor::all()[0]->titleindex!!}</h1>
                </div>
            </div>
        </div>
    </header>
    <section class="features-icons bg-light text-left">
        <div class="ui-132">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="ui-item">
                            <div class="ui-icon">
                                <i class="features-icons-item fa fa-graduation-cap fa-5x m-auto text-primary"></i>
                            </div>
                            <div class="ui-details">
                                <h2>{{"Миссия"}}</h2>
                                <p>{!! \App\redactor::all()[0]->mission!!}</p>
                            </div>
                        </div>
                        <p></p>
                        <div class="ui-item">
                            <div class="ui-icon">
                                <i class="features-icons-item fa fa-check-square-o fa-5x m-auto text-primary"></i>
                            </div>
                            <div class="ui-details">
                                <h2>{{"Цель"}}</h2>
                                <p>{!! \App\redactor::all()[0]->target!!}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="ui-item">
                            <div class="ui-icon">
                                <i class="features-icons-icon fa fa-pencil-square-o fa-5x m-auto text-primary"></i>
                            </div>
                            <div class="ui-details">
                                <h2>{{"Задачи"}}</h2>
                                <p>{!! \App\redactor::all()[0]->tasks!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div id="picHead" class="col-lg-6 order-lg-2 text-white showcase-img"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>{{"Рубрики:"}}</h2>
                    <p class="lead mb-0">
                    <ul id="glav">
                        {!!\App\redactor::all()[0]->headings !!}
                    </ul>
                    </p>
                </div>
            </div>

            <div class="row no-gutters">
                <div id="picNec" class="col-lg-6 text-white showcase-img"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>{{"Для публикации статьи необходимо:"}}</h2>
                    <p class="lead mb-0">
                    <ul id="glav">
                        {!! \App\redactor::all()[0]->is_necessary!!}
                    </ul>
                    </p>
                </div>
            </div>

            <div class="row no-gutters">
                <div id="picAten" class="col-lg-6 order-lg-2 text-white showcase-img"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>{{"Внимание!"}}</h2>
                    <p class="lead mb-0">
                        {!! \App\redactor::all()[0]->attention !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

