@extends('layouts.app')



@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="contact_bottom text-center">
            <h3>Login Form</h3>
            @foreach ($errors->all() as $error)
                <p style="color: #f00;">{{ $error }}</p>
            @endforeach
            <form method="post" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="contact-to">
                    <input type="text" name="email" style="margin-left:200px; display:block;" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                    <input type="password" name="password" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" style="margin-left: 10px">
                    <br>
                    <br>
                    <br>
                    <span class="text">
                        <input type="checkbox" class="text" name="remember"> Remember Me
                    </span>
                    <span class="text">
                        <a class="btn btn-link text" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </span>
                </div>
                <div> <button type="submit" class="submit">Send Message</button> </div>
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
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
