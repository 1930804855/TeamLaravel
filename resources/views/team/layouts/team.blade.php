<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CRM管理系统-@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/static/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/static/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/static/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/static/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/static/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/static/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/static/css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/static/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/static/css/style.css">

	<!-- Modernizr JS -->
	<script src="/static/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="/static/js/respond.min.js"></script>
	<![endif]-->
	<!-- jQuery -->
	<script src="/static/js/jquery.min.js"></script>
	
	</head>
	<body>
		
	<div class="colorlib-loader"></div>


		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2 text-center">
							<div id="colorlib-logo"><a href="index.html">CRM管理系统</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li class="active"><a href="{{url('/')}}">首页</a></li>
								@if(session('admin')->r_id==1)
								<li class="has-dropdown navClick">
									<a href="{{url('salesman/index')}}">业务员管理</a>
									<ul class="dropdown">
										<li><a href="{{url('salesman/create')}}">业务员添加</a></li>
										<li><a href="{{url('salesman/index')}}">业务员展示</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="{{url('client')}}">客户管理</a>
									<ul class="dropdown">
										<li><a href="{{url('client/create')}}">客户添加</a></li>
										<li><a href="{{url('client')}}">客户展示</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="{{url('admin/index')}}">管理员管理</a>
									<ul class="dropdown">
										<li><a href="{{url('admin/create')}}">管理员添加</a></li>
										<li><a href="{{url('admin/index')}}">管理员展示</a></li>
									</ul>
								</li>
								@elseif(session('admin')->r_id==2)
								<li class="has-dropdown">
									<a href="work.html">管理员管理</a>
									<ul class="dropdown">
										<li><a href="{{url('admin/create')}}">管理员添加</a></li>
										<li><a href="{{url('admin/index')}}">管理员展示</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="{{url('client')}}">客户管理</a>
									<ul class="dropdown">
										<li><a href="{{url('client/create')}}">客户添加</a></li>
										<li><a href="{{url('client')}}">客户展示</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="{{url('demand')}}">综合查询</a>
									<ul class="dropdown">
										<li><a href="{{url('demand')}}">客户信息查询</a></li>
										<li><a href="{{url('demand/meeting')}}">客户拜访记录查询</a></li>
									</ul>
								</li>
								@elseif(session('admin')->r_id==3)
								<li class="has-dropdown">
									<a href="work.html">管理员管理</a>
									<ul class="dropdown">
										<li><a href="{{url('admin/create')}}">管理员添加</a></li>
										<li><a href="{{url('admin/index')}}">管理员展示</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="{{url('client')}}">客户管理</a>
									<ul class="dropdown">
										<li><a href="{{url('client/create')}}">客户添加</a></li>
										<li><a href="{{url('client')}}">客户展示</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="work.html">拜访会议管理</a>
									<ul class="dropdown">
										<li><a href="{{url('meeting/create')}}">添加拜访会议</a></li>
										<li><a href="{{url('meeting/index')}}">拜访会议展示</a></li>
									</ul>
								</li>
								@endif
								
								<li class="btn-cta"><a>欢迎【<b style="color: #9F35FF">{{session('admin')->admin_name}}</b>】登录</a></li>
								<li class="btn-cta"><a>当前登录身份是：<i style="color: #9F35FF">@if(session('admin')->r_id==1)系统管理员@elseif(session('admin')->r_id==2)主管@elseif(session('admin')->r_id==3)业务员@endif</i></a></li>
								<li class="btn-cta"><a href="{{url('/loginout')}}">退出</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<!-- 内容开始 -->
	    @yield('content')
	    <!-- 内容结束 -->

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	
	<!-- jQuery Easing -->
	<script src="/static/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/static/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/static/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="/static/js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="/static/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/static/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/static/js/jquery.magnific-popup.min.js"></script>
	<script src="/static/js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="/static/js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="/static/js/main.js"></script>

	</body>
</html>

