@component('mail::message')
# Introduction

You received this message:
<p>{{$contact->message}}</p>

From:
<span>{{$contact->email}}</span>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
