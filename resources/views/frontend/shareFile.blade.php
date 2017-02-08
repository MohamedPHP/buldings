@if (count($buldings) > 0)
    @foreach ($buldings->chunk(3) as $buldingChunk)
        <div class="row">
            @foreach ($buldingChunk as $bulding)
                <div class="col-md-4">
                    <div class="productbox">
                        <img src="{{asset('frontend/images/bu_image.jpg')}}" class="img-responsive">
                        <div class="producttitle">{{$bulding->name}}</div>
                        <p class="text-justify" style="font-size: 14px;">{{str_limit($bulding->small_dis, 100)}} And Square equals: {{$bulding->square}} M</p>
                        <br>
                        <div class="productprice">
                            <div class="pull-right">
                                <a href="#" class="btn btn-link">
                                    Details
                                </a>
                            </div>
                            <div class="pricetext">
                                {{$bulding->price}} $
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <div class="text-center">
        {{ $buldings->appends(Request::except('page'))->render() }}
    </div>
@else
    <div class="row">
        <div class="alert alert-warning">There Is No Buldings Right Now Please Wait Till Admin Add Some.</div>
    </div>
@endif
