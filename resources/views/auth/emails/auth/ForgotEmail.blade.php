@component('mail::message')
# Introduction

Tulung konfirmasi Kodene

<h1>Hello,{{$user->name}}</h1>
<h2>Kode OTP {{$user->activation_token}}</h2>
<h5>Sangat Rahasia Aja ngomong Sapa-sapa</h5>

Thanks U,<br>
{{config('app.name')}}
@endcomponent 