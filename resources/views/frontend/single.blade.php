@extends('layouts.app')



@section('styles')
    {!! Html::style('frontend/css/bu.css') !!}
    <style media="screen">
        .breadcrumb{
            background-color: #F1F2F3;
            box-shadow: 3px 3px 3px #ccc;
        }
        .infoBu{
            background-color: #fff;
            box-shadow: 2px 2px 5px #ccc;
            border-radius: 3px;
            padding: 15px;
            margin-bottom: 10px;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row">
            @include('frontend.searchForm')
            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('bulding.single', ['id' => $bulding->id]) }}">{{ $bulding->name }}</a></li>
                </ol>
                <hr>
                <h1 style="font-size: 26px;">{{ $bulding->name }}</h1>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <span class="btn btn-default">
                                Square: {{ $bulding->square }}
                            </span>
                            <span class="btn btn-default">
                                Area: {{ places()[$bulding->place_id] }}
                            </span>
                            <span class="btn btn-default">
                                Rent: {{ bulding_rent()[$bulding->rent] }}
                            </span>
                            <span class="btn btn-default">
                                Type: {{ bulding_type()[$bulding->type] }}
                            </span>
                            <span class="btn btn-default">
                                Rooms: {{ $bulding->rooms }}
                            </span>
                            <span class="btn btn-default">
                                price: {{ $bulding->price }}
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" style="height: 300px">
                        <img src="{{asset('frontend/images/bu_image.jpg')}}" class="img-responsive img-rounded img-thumbnail" style="width: 100%; height: 100%;">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 infoBu">
                        <h3>Describtion</h3>
                        <hr>
                        {!! nl2br($bulding->larg_dis) !!}
                    </div>
                    <div class="col-md-12 infoBu">
                        <div id="map" style="width:100%;height:300px"></div>
                    </div>
                    <div class="col-md-12 infoBu">
                        <h3>Same Rent Buldings</h3>
                        <hr>
                        @include('frontend.shareFile', ['buldings' => $same_rent])
                    </div>
                    <div class="col-md-12 infoBu">
                        <h3>Same Type Buldings</h3>
                        <hr>
                        @include('frontend.shareFile', ['buldings' => $same_type])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('scripts')
    <script>
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng({{ $bulding->latitude }}, {{ $bulding->langtude }});
        var mapOptions = {center: myCenter, zoom: 6};
        var map = new google.maps.Map(mapCanvas,mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
            animation: google.maps.Animation.BOUNCE
        });
        marker.setMap(map);
    }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9-6jIkdA6mjeB9VGwsi1peGI16GWDG1s&callback=myMap"></script>
@endsection
