<nav class="navbar navbar-expand-lg navbar-light  sticky-top" id="nav">
    <a href="{{url("/")}}" class="navbar-brand">
        <img src="{{url("images/logo.png")}}" width="70" height="70" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{url("/")}}" class="nav-link" id="nav-link">{{'Главная'}}</a>
            </li>
            <li class="nav-item ">
                <a href="{{url("catalogs")}}" class="nav-link" id="nav-link">{{"Каталог книг"}}</a>
            </li>
            <li class="nav-item ">
                <a href="{{url("books?cat=1")}}" class="nav-link" id="nav-link">{{"Архив журнала"}}</a>
            </li>
            <li class="nav-item ">
                <a href="{{url("redkol")}}" class="nav-link" id="nav-link">{{"Состав редколегии"}}</a>
            </li>
            <li class="nav-item ">
                <a href="{{url("umo")}}" class="nav-link" id="nav-link">{{"Состав УМО"}}</a>
            </li>
            <li class="nav-item ">
                <a href="{{url("contact")}}" class="nav-link" id="nav-link">{{"Связь с редакцией"}}</a>
            </li>
            <li>
                <form class="form-inline my-2 my-lg-0">
                    <input type="text" class="form-control mr-sm-2" placeholder="Поиск"
                           aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0">{{"Поиск"}}</button>
                </form>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user" style="color:white;"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="left: -72px">
                    @guest
                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Вход') }}</a>
                        @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}"
                            >{{ __('Регистрация') }}</a>
                        @endif
                    @elseif(Auth::user() &&  !Auth::user()->inRole('is_admin'))
                        <a class="dropdown-item" href="{{ url('/profile') }}">{{"Моя анкета"}}</a>
                        <a class="dropdown-item" href="{{ url('/art') }}">{{"Статьи"}}</a>
                        @if(Auth::user()->surname!=null && Auth::user()->patronymic!=null && Auth::user()->full_name_of_organization!=null && Auth::user()->position!=null)
                            <a class="dropdown-item" href="{{ route('list_drafts') }}">{{"Черновики"}}</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" style="color: black" href="{{ route('logout') }} "
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); ">
                            {{ __('Выход') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;color: black">
                            @csrf
                        </form>
                    @else
                        <a class="dropdown-item" href="{{ url('/profile') }}">{{"Моя анкета"}}</a>
                        <a class="dropdown-item" href="{{ url('/art') }}">Статьи</a>
                        <a class="dropdown-item" href="{{ route('list_drafts') }}">{{"Черновики"}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('users.show') }}" style="color: black">
                            {{"Пользователи"}}</a>
                        <a class="dropdown-item" href="{{ route('redactor') }}" style="color: black">{{"Редактировать
                            информацию"}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" style="color: black" href="{{ route('logout') }} "
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); ">
                            {{ __('Выход') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;color: black">
                            @csrf
                        </form>
                </div>
            </li>
            @endguest
            <li class="nav-item">
                <h5 style="color: white">{{Auth::user()?Auth::user()->name:''}}</h5>
            </li>
        </ul>
    </div>
</nav>


