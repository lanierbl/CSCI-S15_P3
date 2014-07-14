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

        <a href='/lorem-ipsum-generator'>Lorem Ipsum Generator</a><br/>
        <a href='/random-user-generator'>Random User Generator</a><br/>
        <a href='/xkcd-password-generator'>XKCD Password Generator</a><br/>

    </fieldset>

</div>


@stop