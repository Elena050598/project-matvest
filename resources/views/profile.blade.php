@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{"Ваша анкета, "}}{{Auth::user()->name}}.</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" class="form-horizontal" name="profile">
                            @csrf
                            <div class="form-group">
                                <label>{{"Фамилия"}}</label>
                                <input name="surname" type="text" class="form-control"
                                       value="{{old("surname")??$user->surname}}" id="surname">
                            </div>
                            <div class="form-group">
                                <label>{{"Имя"}}</label>
                                <input name="name" type="text" class="form-control" value="{{old("name")??$user->name}}"
                                       id="name">
                            </div>
                            <div class="form-group">
                                <label>{{"Отчество"}}</label>
                                <input name="patronymic" type="text" class="form-control"
                                       value="{{old("patronymic")??$user->patronymic}}" id="patronymic">
                            </div>
                            <div class="form-group">
                                <label>{{"Страна"}}</label>
                                <input name="country" type="text" class="form-control"
                                       value="{{old("country")??$user->country}}" id="country">
                            </div>
                            <div class="form-group">
                                <label>{{"Город"}}</label>
                                <input name="city" type="text" class="form-control" value="{{old("city")??$user->city}}"
                                       id="city">
                            </div>
                            <div>
                                <label for="inlineFormCustomSelect">{{"Пол"}}</label>
                                <select name="gender" class="custom-select mr-sm-2">
                                    @foreach($genders as $id=>$gender)
                                        <option value="{{ $id  }}" {{ ($user->gender == $id)?'selected':'' }}>
                                            {{ $gender}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="inlineFormCustomSelect">{{"Учёная степень"}}</label>
                                <select name="academic_degree" class="custom-select mr-sm-2">
                                    @foreach($academic_degrees as $id=>$academic_degree)
                                        <option value="{{ $id  }}" {{ ($user->academic_degree == $id)?'selected':'' }}>
                                            {{ $academic_degree}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="inlineFormCustomSelect">{{"Учёное звание"}}</label>
                                <select name="academic_rank" class="custom-select mr-sm-2">
                                    @foreach($academic_ranks as $id=>$academic_rank)
                                        <option value="{{ $id  }}" {{ ($user->academic_rank == $id)?'selected':'' }}>
                                            {{ $academic_rank}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{"Должность"}}</label>
                                <input name="position" type="text" class="form-control"
                                       value="{{old("position")??$user->position}}" id="position">
                            </div>
                            <div class="form-group">
                                <label>{{"Полное название организации"}}</label>
                                <input name="full_name_of_organization" type="text" class="form-control"
                                       value="{{old("full_name_of_organization")??$user->full_name_of_organization}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{"Телефон"}}</label>
                                <input type="tel" name="phone" class="form-control bfh-phone"
                                       data-format="+7 (ddd) ddd-dddd" pattern="(\+[\d\ \(\)\-]{16})"
                                       value="{{old("phone")??$user->phone}}">
                            </div>
                            <div class="form-group">
                                <label>{{"Полный почтовый адрес (с индексом)"}}</label>
                                <textarea name="address" class="form-control" id="address"
                                          rows="3"> {{old("address")??$user->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>{{"E-mail"}}</label>
                                <input name="email" type="text" class="form-control" id="email"
                                       value="{{old("email")??$user->email}}">
                            </div>
                            <div class="form-check">
                                <input name="consists_of_UMO" class="form-check-input" type="checkbox" disabled
                                       value="1" {{$user->inRole('consists_of_UMO')?"checked":""}} >
                                <label class="form-check-label">
                                    {{"Член УМО"}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="consists_of_editorial_board" class="form-check-input" type="checkbox"
                                       disabled
                                       value="1" {{$user->inRole('consists_of_editorial_board')?"checked":""}}>
                                <label class="form-check-label">
                                    {{"Член редакционной коллегии"}}
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <input type="submit" class="btn btn-primary" value="Сохранить">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

