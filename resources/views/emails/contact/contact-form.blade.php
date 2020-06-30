@component('mail::message')
    {{"Сообщение от пользователя Matvest.ru"}}
    {{"Имя:"}} {{ $data['name'] }}
    {{"Email:"}} {{ $data['email'] }}
    {{"Сообщение:"}} {{ $data['message'] }}
@endcomponent
