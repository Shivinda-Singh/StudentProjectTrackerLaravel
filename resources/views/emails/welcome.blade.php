@component('mail::message')
Welcome to Student Project Tracker, {{$user->name}}

@component('mail::button', ['url' => 'http://localhost:8000'])
View Projects
@endcomponent

@component('mail::panel', ['url' => ''])
If it ain't right, it ain't wrong'
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
