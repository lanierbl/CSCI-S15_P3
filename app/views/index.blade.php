@extends('_master')

@section('title')
Programmer's Best Friend
@stop

@section('head')
    {{ HTML::style('css/style.css') }}
@stop

@section('content')

<div class="container">

    <fieldset id="passwd_form">
        <legend>Programmer's Best Friend</legend>

        <h1>Lorem Ipsum Generator</h1>
        <p>Creates <a href='/lorem-ipsum-generator'>random filler text<a/> for your applications.</p>
        <br>
        <h1>Random User Generator</h1>
        <p>Creates <a href='/random-user-generator'>random user information<a/> for your applications.</p>
        <br>
        <h1>XKCD Password Generator</h1>
        <p>Creates <a href='/xkcd-password-generator'>random strong passwords<a/> for user accounts.</p>

    </fieldset>

</div>


@stop