@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            <h3 class="text-center">{{'ИНФОРМАЦИЯ
О СОВЕТЕ УМО ПО МАТЕМАТИКЕ
ПЕДВУЗОВ И УНИВЕРСИТЕТОВ ВОЛГО-ВЯТСКОГО РЕГИОНА'}}</h3>
            <h2 class="text-center">{{'Состав Совета УМО'}}</h2>
            <div class="bd-example" role="tabpanel" style="border: solid #f8f9fa;">
            <ul class="list-unstyled" style="padding: 30px;">
                @foreach($users as $user)
                    @if ($user->inRole('consists_of_UMO'))
                        <div class="bd-example" role="tabpanel" style="border: solid rgba(135, 180, 255, 0.22) ;">
                        <li class="media">
                            <div class="media-body" style="padding: 10px;">
                                <h5 class="mt-0 mb-1">{{ $user->surname}} {{ $user->name}} {{ $user->patronymic}}</h5>
                                {{ $academic_degrees[$user->academic_degree]}}. {{$academic_ranks[$user->academic_rank]
                                }} ({{$user->city}}, {{$user->full_name_of_organization}});
                            </div>
                        </li>
                        </div>
                    @endif
                @endforeach
            </ul>
        </div>
        </div>
    </div>
@endsection
