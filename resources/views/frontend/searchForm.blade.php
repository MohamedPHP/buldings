<div class="col-md-3">
    <div class="list-group">
        <h4>Advanced Search</h4>
        {!! Form::open(['route' => 'bulding.search', 'method' => 'get']) !!}
        <div class="form-group">
            {!! Form::text('price_from', null, ['class' => 'form-control', 'placeholder' => 'price_from']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('price_to', null, ['class' => 'form-control', 'placeholder' => 'price_to']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('rooms', roomnumber(), null, ['class' => 'form-control', 'placeholder' => 'bulding rooms']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('type', bulding_type(), null, ['class' => 'form-control', 'placeholder' => 'bulding type']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('rent', bulding_rent(), null, ['class' => 'form-control', 'placeholder' => 'bulding rent']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('place_id', places(), null, ['class' => 'form-control', 'placeholder' => 'bulding Place']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('square', null, ['class' => 'form-control', 'placeholder' => 'bulding square']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Search', ['class' => 'btn btn-success btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="list-group">
        <a href="{{ url('/buldings') }}" class="list-group-item {{ isset($active) && $active == 'all' ? 'active' : ''}}">All buldings <span class="pull-right"><span class="badge">{{ count(App\Bulding::where('status', 1)->get()) }}</span></span></a>
        <a href="{{ url('/buldings/egar') }}" class="list-group-item {{ isset($active) && $active == 'egar' ? 'active' : ''}}">Egar <span class="pull-right"><span class="badge">{{ count(App\Bulding::where('status', 1)->where('rent', 0)->get()) }}</span></span></a>
        <a href="{{ url('/buldings/tamleek') }}" class="list-group-item {{ isset($active) && $active == 'tamleek' ? 'active' : ''}}">Tamleek <span class="pull-right"><span class="badge">{{ count(App\Bulding::where('status', 1)->where('rent', 1)->get()) }}</span></span></a>
        <a href="{{ url('/buldings/type/villas') }}" class="list-group-item {{ isset($active) && $active == 'villa' ? 'active' : ''}}">villas <span class="pull-right"><span class="badge">{{ count(App\Bulding::where('status', 1)->where('type', 0)->get()) }}</span></span></a>
        <a href="{{ url('/buldings/type/apartments') }}" class="list-group-item {{ isset($active) && $active == 'apartment' ? 'active' : ''}}">apartments <span class="pull-right"><span class="badge">{{ count(App\Bulding::where('status', 1)->where('type', 1)->get()) }}</span></span></a>
        <a href="{{ url('/buldings/type/beachHomes') }}" class="list-group-item {{ isset($active) && $active == 'beachhome' ? 'active' : ''}}">beachhomes <span class="pull-right"><span class="badge">{{ count(App\Bulding::where('status', 1)->where('type', 2)->get()) }}</span></span></a>
    </div>
</div>
