@extends('layouts.app')
@section('content')
    <div class="wrapper-posts" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container"style="max-width:100%">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">{{"ФИО"}}</th>
                    <th scope="col">{{"Организация"}}</th>
                    <th scope="col">{{"Город"}}</th>
                    <th scope="col">{{"Дата регистрации"}}</th>
                    <th scope="col">{{"Телефон"}}</th>
                    <th scope="col">{{"Почтовый адрес"}}</th>
                    <th scope="col">{{"Адрес электронной почты"}}</th>
                    <th scope="col">{{"Кол-во статей"}}</th>
                    <th scope="col">{{"Роли"}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->surname }} {{$user->name }} {{$user->patronymic }}</td>
                        <td>{{$user->full_name_of_organization}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$articles = $user->articles->count()}}</td>
                        <td>
                            <form method="post" name="users" action="{{ route('users.store', $user->id) }}">
                                @csrf
                                <div>
                                    <select class="authorselect" name="roles[]" multiple="multiple"
                                            style="width: 100%">
                                        <?php
                                        $array = array();
                                        foreach ($roles as $role) {
                                            $array[$role->id] = false;
                                        }
                                        $trueRoles = $user->roles;
                                        foreach ($trueRoles as $trueRole) {
                                            $array[$trueRole->id] = true;
                                        }
                                        ?>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($array[$role->id])?'selected':'' }}>
                                                {{ $role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <input type="submit" class="btn btn-primary" value="Сохранить">
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('profile.destroy', [$user->id, $user->name]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{"Удалить"}}
                                </button>
                            </form>
                        </td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection