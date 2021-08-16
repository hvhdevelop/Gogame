@extends('layout.app')
@section('content')
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Trung tâm hỗ trợ</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.html">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Trợ giúp</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	
	<!-- section -->
	<section class="section section--last section--catalog">
		<div class="container">
			<!-- catalog -->
			<div class="row catalog">
				<!-- filter wrap -->
				<div class="col-12 col-lg-20">
					<div class="row">
						<div class="col-12">
							<!-- filter -->
							<div class="filter">
								<h4 class="filter__title">Trợ giúp</h4>

								<div class="filter__group">
									<input type="text" class="filter__input" placeholder="Từ khóa">
								</div>

								<div class="filter__group">
									<label class="filter__label">Vấn đề:</label>
									<ul class="filter__nav">
										<li><a class="active" href="#">Tất cả</a></li>
										<li><a href="#">Tài khoản</a></li>
										<li><a href="#">Chính sách</a></li>
										<li><a href="#">Điều khoản</a></li>
										<li><a href="#">Nền tảng</a></li>
										<li><a href="#">Giảm giá</a></li>
										<li><a href="#">Thanh toán</a></li>
										<li><a href="#">Khiếu nại</a></li>
									</ul>
								</div>
							</div>
							<!-- end filter -->
						</div>
					</div>
				</div>
				<!-- end filter wrap -->

				<!-- content wrap -->
				<div class="col-12 col-lg-80">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="faq">
								<h3 class="faq__title">Tài khoản</h3>
								<ul class="faq__list">
									<li><a href="#">làm cách nào để tạo tài khoản ?</a></li>
								</ul>
							</div>
						</div>

						
					</div>
				</div>
				<!-- end content wrap -->
			</div>
			<!-- end catalog -->	
		</div>
	</section>
	<!-- end section -->
@endsection