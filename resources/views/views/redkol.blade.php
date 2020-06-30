@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            <h2 class="text-center">{{'Редакционная коллегия
периодического межвузовского сборника научно-методических работ
"Математический вестник педвузов и университетов
Волго-Вятского региона"'}}</h2>
            <div class="bd-example" role="tabpanel" style="border: solid #f8f9fa;">
            <div class="row" style="padding: 30px;">
                <div class="col-md-4 col-sm-12">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-glavRed-list" data-toggle="list" href="#list-glavRed" role="tab" aria-controls="glavRed">{{ 'Главный редактор'}}</a>
                        <a class="list-group-item list-group-item-action" id="list-zamGlavRed-list" data-toggle="list" href="#list-zamGlavRed" role="tab" aria-controls="zamGlavRed">{{ 'Заместитель главного редактора'}}</a>
                        <a class="list-group-item list-group-item-action" id="list-otvetRed-list" data-toggle="list" href="#list-otvetRed" role="tab" aria-controls="otvetRed">{{ 'Ответственный секретарь'}}</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">{{ 'Члены редакционной коллегии'}}</a>
                    </div>
                </div>

                <div class="col-md-8 col-sm-12">
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="list-glavRed" role="tabpanel" aria-labelledby="list-glavRed-list">

                            @foreach($users as $user)
                                @if ($user->inRole('glavRed'))
                                        <div class="bd-example" role="tabpanel" style="border: solid rgba(135, 180, 255, 0.22);">
                                    <li class="media">
                                        <div class="media-body" style="padding: 10px;">
                                            <h5 class="mt-0 mb-1">{{$user ?  $user->surname. ' ' .$user->name. ' ' .$user->patronymic:''}}</h5>
                                            {{ $user ? $academic_degrees[$user->academic_degree]. '. ' .$academic_ranks[$user->academic_rank]
                                . '. ' .$user->city. '. ' .$user->full_name_of_organization:''}}
                                        </div>
                                    </li>
                                        </div>
                                @endif
                            @endforeach</div>
                        <div class="tab-pane fade" id="list-zamGlavRed" role="tabpanel" aria-labelledby="list-zamGlavRed-list">@foreach($users as $user)
                                @if ($user->inRole('zamGlavRed'))
                                    <div class="bd-example" role="tabpanel" style="border: solid rgba(135, 180, 255, 0.22);">
                                    <li class="media">
                                        <div class="media-body" style="padding: 10px;">
                                            <h5 class="mt-0 mb-1">{{$user ?  $user->surname. ' ' .$user->name. ' ' .$user->patronymic:''}}</h5>
                                            {{ $user ? $academic_degrees[$user->academic_degree]. '. ' .$academic_ranks[$user->academic_rank]
                                . '. ' .$user->city. '. ' .$user->full_name_of_organization:''}}
                                        </div>
                                    </li>
                                    </div>
                                @endif
                            @endforeach</div>
                        <div class="tab-pane fade" id="list-otvetRed" role="tabpanel" aria-labelledby="list-otvetRed-list">@foreach($users as $user)
                                @if ($user->inRole('otvetRed'))
                                    <div class="bd-example" role="tabpanel" style="border: solid rgba(135, 180, 255, 0.22);">
                                    <li class="media">
                                        <div class="media-body" style="padding: 10px;">
                                            <h5 class="mt-0 mb-1">{{$user ?  $user->surname. ' ' .$user->name. ' ' .$user->patronymic:''}}</h5>
                                            {{ $user ? $academic_degrees[$user->academic_degree]. '. ' .$academic_ranks[$user->academic_rank]
                                . '. ' .$user->city. '. ' .$user->full_name_of_organization:''}}
                                        </div>
                                    </li>
                                    </div>
                                @endif
                            @endforeach</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                            @foreach($users as $user)
                                @if ( $user->inRole('consists_of_editorial_board'))
                                    <div class="bd-example" role="tabpanel" style="border: solid rgba(135, 180, 255, 0.22);">
                                    <li class="media">
                                        <div class="media-body" style="padding: 10px;">
                                            <h5 class="mt-0 mb-1">{{$user ?  $user->surname. ' ' .$user->name. ' ' .$user->patronymic:''}}</h5>
                                            {{ $user ? $academic_degrees[$user->academic_degree]. '. ' .$academic_ranks[$user->academic_rank]
                                . '. ' .$user->city. '. ' .$user->full_name_of_organization:''}}
                                        </div>
                                    </li>
                                    </div>
                                @endif
                            @endforeach</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
