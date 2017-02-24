@extends('layouts.app')


@section('content')
    <div class="banner text-center" style="background: url({{ asset(getString('slider_image')) }}) no-repeat center;">
    	<div class="container">
    		<div class="banner-info">
    			<h1>Welcome To {{ getString() }}</h1>
                <hr>
                <div class="row">
                    {!! Form::open(['route' => 'bulding.search', 'method' => 'get']) !!}
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::text('price_from', null, ['class' => 'form-control', 'placeholder' => 'price_from']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::text('price_to', null, ['class' => 'form-control', 'placeholder' => 'price_to']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::select('rooms', roomnumber(), null, ['class' => 'form-control', 'placeholder' => 'bulding rooms']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::select('type', bulding_type(), null, ['class' => 'form-control', 'placeholder' => 'bulding type']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::select('rent', bulding_rent(), null, ['class' => 'form-control', 'placeholder' => 'bulding rent']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::select('place_id', places(), null, ['class' => 'form-control', 'placeholder' => 'bulding Place']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::text('square', null, ['class' => 'form-control', 'placeholder' => 'bulding square']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::submit('Search', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
    		</div>
    	</div>
    </div>
    <div class="main">
    	<div class="content_white">
    		<h2>Featured Services</h2>
    		<p>Quisque cursus metus vitae pharetra auctor, sem massa mattis semat interdum magna.</p>
    	</div>
    	<div class="featured_content" id="feature">
    		<div class="container">
    			<div class="row text-center">
    				<div class="col-mg-3 col-xs-3 feature_grid1">
    					<i class="fa fa-cog fa-3x"></i>
    					<h3 class="m_1"><a href="services.html">Legimus graecis</a></h3>
    					<p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p><a class="feature_btn" href="services.html">More</a>
    				</div>
    				<div class="col-mg-3 col-xs-3 feature_grid1">
    					<i class="fa fa-comments-o fa-3x"></i>
    					<h3 class="m_1"><a href="services.html">Mazim minimum</a></h3>
    					<p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p><a class="feature_btn" href="services.html">More</a>
    				</div>
    				<div class="col-md-3 col-xs-3 feature_grid1">
    					<i class="fa fa-globe fa-3x"></i>
    					<h3 class="m_1"><a href="services.html">Modus altera</a></h3>
    					<p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p><a class="feature_btn" href="services.html">More</a>
    				</div>
    				<div class="col-md-3 col-xs-3 feature_grid2">
    					<i class="fa fa-history fa-3x"></i>
    					<h3 class="m_1"><a href="services.html">Melius eligendi</a></h3>
    					<p class="m_2">Lorem ipsum dolor sit amet, facilisis egestas sodales non luctus, sem quas potenti malesuada vel phasellus.</p><a class="feature_btn" href="services.html">More</a>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="about-info">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-8">
    					<div class="block-heading-two">
    						<h2><span>About Our Company</span></h2>
    					</div>
    					<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.</p><br>
    					<p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p><a class="banner_btn" href="about.html">Read More</a>
    				</div>
    				<div class="col-md-4">
    					<div class="block-heading-two">
    						<h3><span>Our Advantages</span></h3>
    					</div>
    					<div class="panel-group" id="accordion-alt3">
    						<div class="panel">
    							<div class="panel-heading">
    								<h4 class="panel-title"><a data-parent="#accordion-alt3" data-toggle="collapse" href="#collapseOne-alt3"><i class="fa fa-angle-right"></i> Quisque cursus metus vitae pharetra auctor</a></h4>
    							</div>
    							<div class="panel-collapse collapse" id="collapseOne-alt3">
    								<div class="panel-body">
    									<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
    								</div>
    							</div>
    						</div>
    						<div class="panel">
    							<div class="panel-heading">
    								<h4 class="panel-title"><a data-parent="#accordion-alt3" data-toggle="collapse" href="#collapseTwo-alt3"><i class="fa fa-angle-right"></i> Duis autem vel eum iriure dolor in hendrerit</a></h4>
    							</div>
    							<div class="panel-collapse collapse" id="collapseTwo-alt3">
    								<div class="panel-body">
    									<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
    								</div>
    							</div>
    						</div>
    						<div class="panel">
    							<div class="panel-heading">
    								<h4 class="panel-title"><a data-parent="#accordion-alt3" data-toggle="collapse" href="#collapseThree-alt3"><i class="fa fa-angle-right"></i> Quisque cursus metus vitae pharetra auctor</a></h4>
    							</div>
    							<div class="panel-collapse collapse" id="collapseThree-alt3">
    								<div class="panel-body">
    									<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
    								</div>
    							</div>
    						</div>
    						<div class="panel">
    							<div class="panel-heading">
    								<h4 class="panel-title"><a data-parent="#accordion-alt3" data-toggle="collapse" href="#collapseFour-alt3"><i class="fa fa-angle-right"></i> Duis autem vel eum iriure dolor in hendrerit</a> </h4>
    							</div>
    							<div class="panel-collapse collapse" id="collapseFour-alt3">
    								<div class="panel-body">
    									<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="highlight-info">
    		<div class="overlay spacer">
    			<div class="container">
    				<div class="row text-center">
    					<div class="col-sm-3 col-xs-6">
    						<i class="fa fa-smile-o fa-5x"></i>
    						<h4>120+ Happy Clients</h4>
    					</div>
    					<div class="col-sm-3 col-xs-6">
    						<i class="fa fa-check-square-o fa-5x"></i>
    						<h4>600+ Projects Completed</h4>
    					</div>
    					<div class="col-sm-3 col-xs-6">
    						<i class="fa fa-trophy fa-5x"></i>
    						<h4>25 Awards Won</h4>
    					</div>
    					<div class="col-sm-3 col-xs-6">
    						<i class="fa fa-map-marker fa-5x"></i>
    						<h4>3 Offices</h4>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="testimonial-area">
    		<div class="testimonial-solid">
    			<div class="container">
    				<h2>Client Testimonials</h2>
    				<div class="carousel slide" data-ride="carousel" id="carousel-example-generic">
    					<ol class="carousel-indicators">
    						<li class="active" data-slide-to="0" data-target="#carousel-example-generic">
    							<a href="#"></a>
    						</li>
    						<li class="" data-slide-to="1" data-target="#carousel-example-generic">
    							<a href="#"></a>
    						</li>
    						<li class="" data-slide-to="2" data-target="#carousel-example-generic">
    							<a href="#"></a>
    						</li>
    						<li class="" data-slide-to="3" data-target="#carousel-example-generic">
    							<a href="#"></a>
    						</li>
    					</ol>
    					<div class="carousel-inner">
    						<div class="item active">
    							<p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
    							<p><strong>- John Doe -</strong></p>
    						</div>
    						<div class="item">
    							<p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
    							<p><strong>- Jane Doe -</strong></p>
    						</div>
    						<div class="item">
    							<p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
    							<p><strong>- John Smith -</strong></p>
    						</div>
    						<div class="item">
    							<p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam quis nostrud exerci tation."</p>
    							<p><strong>- Linda Smith -</strong></p>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection
