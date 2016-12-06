@extends('layouts.app')



@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        {{--
        name
        email
        password
        password_confirmation
         --}}
        <div class="contact_bottom text-center">
            <h3>Register Form</h3>
            @foreach ($errors->all() as $error)
                <p style="color: #f00;">{{ $error }}</p>
            @endforeach
            <form method="post" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="contact-to">
                    <input type="text" name="name" style="margin-left:402px; display:block;" class="text" placeholder="Name">
                    <input type="text" name="email"style="margin-left:402px; display:block;" class="text" placeholder="Email">
                    <input type="password" name="password"style="margin-left:402px; display:block;" class="text" placeholder="password" style="margin-left: 10px">
                    <input type="password" name="password_confirmation"style="margin-left:402px; display:block;" class="text" placeholder="password_confrimation" style="margin-left: 10px">
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div> <button type="submit" class="submit">Register</button> </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
