<footer class="page-footer  navbar-dark" id="foot" style="flex: 0 0 auto;">
    <div class="container text-center text-md-left">
        <div class="row">
            <div class="col-md-3 mx-auto">
                <a href="{{url("/")}}" class="navbar-brand">
                    <img src="{{url("images/logo.png")}}" width="70" height="70" alt="logo">
                </a>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-3 mx-auto">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{url("catalogs")}}">{{"Каталог книг"}}</a>
                    </li>
                    <li>
                        <a href="{{url("books?cat=1")}}">{{"Архив журнала"}}</a>
                    </li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-3 mx-auto">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{url("redkol")}}">{{"Состав редколегии"}}</a>
                    </li>
                    <li>
                        <a href="{{url("umo")}}">{{"Состав УМО"}}</a>
                    </li>

                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-3 mx-auto">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{url("contact")}}">{{"Связь с редакцией"}}</a>
                    </li>
                    <li>
                        <a class="footer-link" href="{{url("infa")}}">{{"Информация для авторов"}}</a>
                    </li>
                    <li>
                        <a class="footer-link"
                           href="{{ asset(\App\redactor::all()[0]->file) }}">{{"Образец оформления статьи"}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">{{"© 2020 Copyright:"}}
        <a href="{{url("/")}}">{{"МатВест"}}</a></div>
</footer>


