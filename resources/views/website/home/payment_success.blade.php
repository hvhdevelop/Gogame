@extends('layout.app')
@section('content')
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Thanh toán</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="{{ route('Home') }}">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Thanh toán</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	
	<!-- section -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12">
					
					<div class="cart">
						<div class="article__content">
							<h1>Mua hàng thành công !</h1>
						
											
						</div>					
					</div>									
				</div>
			</div>	
		</div>
	</div>
	<!-- end section -->
@endsection