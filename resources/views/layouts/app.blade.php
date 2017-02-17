<!DOCTYPE html>
<html lang="en">
    <head>


        <title>{{ getString() }}</title>

        {!! Html::style('frontend/css/bootstrap.min.css') !!}
        {!! Html::style('frontend/css/flexslider.css') !!}
        {!! Html::style('frontend/css/style.css') !!}
        {!! Html::style('frontend/css/font-awesome.min.css') !!}
        {!! Html::script('frontend/js/jquery.min.js') !!}

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

        @yield('styles')


    </head>
    <body id="app-layout">
        <div class="header">
            <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
                <div class="menu"> <a class="toggleMenu" href="#"><img src="{{asset('frontend/images/nav_icon.png')}}" alt="" /> </a>
                    <ul class="nav" id="nav">
                        <li class="current"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Egar <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @foreach (bulding_type() as $key => $value)
                                    <li><a href="{{ url('/buldings/search?rent=0&type=' . $key) }}">{{$value}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Tamleek <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @foreach (bulding_type() as $key => $value)
                                    <li><a href="{{ url('/buldings/search?rent=1&type=' . $key) }}">{{$value}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{ url('/buldings') }}">All Buldings</a></li>
                        <li><a href="#">Contact Us</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                        <div class="clear"></div>
                    </ul>
                    {!! Html::script('frontend/js/responsive-nav.js') !!}
                </div>
            </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="footer_bottom">
                <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
                <div class="copy">
                    <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
                </div>
            </div>
        </div>
        {!! Html::script('frontend/js/bootstrap.min.js') !!}
        {!! Html::script('frontend/js/jquery.flexslider.js') !!}

        @yield('scripts')
    </body>
</html>
