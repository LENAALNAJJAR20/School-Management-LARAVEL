@component('mail::message')
    hello{{$user->name}}
    <p>we under stand it happens</p>
    @component('mail::button',['url'=>url('reset/'.$user->remember_token)])
        reset your password
    @endcomponent
    <p>if you have any issue contact me</p>
    {{config('app.name')}}
@endcomponent
