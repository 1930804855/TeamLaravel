@extends('team.layouts.team')
@section('title','首页')
@section('content')
<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="intro">
							<h1>欢迎使用CRM管理系统</h1>
							<p>Welcome to CRM management system</p>
							<p>你说我的眼睛灿若星辰，那是因为你是星辰，而我的眼中只有你。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<aside id="colorlib-hero">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="flexslider">
							<ul class="slides">
						   	<li style="background-image: url(/static/images/img_bg_1.jpg);">
						   		<div class="overlay"></div>
						   	</li>
						   	<li style="background-image: url(/static/images/img_bg_2.jpg);">
						   		<div class="overlay"></div>
						   	</li>
						   	<li style="background-image: url(/static/images/img_bg_3.jpg);">
						   		<div class="overlay"></div>
						   	</li>
						   	<li style="background-image: url(/static/images/img_bg_4.jpg);">
						   		<div class="overlay"></div>
						   	</li>	
						  	</ul>
					  	</div>
				  	</div>
			  	</div>
		  	</div>
		</aside>

		<footer id="colorlib-footer">
			<div class="newsletter">
				<div class="container">
					<div class="row">
						
					</div>
				</div>
			</div>
			<div class="copy"></div>
		</footer>
@endsection