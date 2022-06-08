@component('mail::message')
# Congratulations!

A new company has been added to the libary!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
Check
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
