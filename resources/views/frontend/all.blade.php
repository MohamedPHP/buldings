@extends('layouts.app')



@section('styles')
    {!! Html::style('frontend/css/bu.css') !!}
    <style media="screen">
        .breadcrumb{
            background-color: #F1F2F3;
            box-shadow: 3px 3px 3px #ccc;
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
                    @if (isset($breadcrumb))
                        @if (!empty($breadcrumb))
                            @foreach ($breadcrumb as $breadKey => $value)
                                <li><a href="{{ url('/buldings/search?' . $breadKey . '=' . $value) }}">{{search()[$breadKey]}} :
                                    @if ($breadKey == 'type')
                                        {{ bulding_type()[$value] }}
                                    @elseif ($breadKey == 'rent')
                                        {{ bulding_rent()[$value] }}
                                    @elseif ($breadKey == 'place_id')
                                        {{ places()[$value] }}
                                    @else
                                        {{ $value }}
                                    @endif
                                </a></li>
                            @endforeach
                        @endif
                    @endif
                </ol>
                @include('frontend.shareFile')
                {{-- Pagination Code --}}
                <div class="text-center">
                    {{ $buldings->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
