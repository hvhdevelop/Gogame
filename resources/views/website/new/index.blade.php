@extends('layout/app')
@section('content')
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Tin tức</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="{{ route('Home')}}l">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Tin mới</li>
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
			<div class="row">
				<div class="col-12">
					<div class="sort">

						<div class="filter__group filter__group--sort">
							<label for="sort" class="filter__label">Sắp xếp:</label>

							<div class="filter__select-wrap">
								<select name="sort" id="sort" class="filter__select">
									<option value="0">Mới nhất</option>
									<option value="1">Cũ nhất</option>
									<option value="2">Xem nhiều</option>
								</select>
							</div>
						</div>

						<div class="sort__results">{{ $count_new }} bài viết</div>
					</div>
				</div>
				@foreach ($news as $new)
				<!-- post -->
				<div class="col-12 col-md-12 col-lg-6">				
					<div class="post">
						<a href="{{ route( 'new.detail', $new->id ) }}" class="post__img">
						<img  width="630px" height="350px" src="{{ asset('uploads/'.$new->image ) }}" alt="">
						</a>

						<div class="post__content">
							<h3 class="post__title"><a href="{{ route( 'new.detail', $new->id ) }}">{{ $new->title }}</a></h3>
							<div class="post__meta">
								<span class="post__date"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M256,64C150,64,64,150,64,256s86,192,192,192,192-86,192-192S362,64,256,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><polyline points='256 128 256 272 352 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg> {{ $new->created_at }}</span>
								<span class="post__comments"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z' style='fill:none;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11' style='fill:none;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg> 18</span>
							</div>
						</div>
					</div>				
				</div>
				<!-- end post -->
				@endforeach
				<!-- video post -->
				<!-- <div class="col-12 col-md-6 col-xl-4">
					<div class="post">
						<a href="interview.html" class="post__cover">
							<img src="img/posts/1.jpg" alt="">
						</a>

						<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="post__video">
							<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M112,111V401c0,17.44,17,28.52,31,20.16l247.9-148.37c12.12-7.25,12.12-26.33,0-33.58L143,90.84C129,82.48,112,93.56,112,111Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/></svg>
						</a>

						<div class="post__content">
							<a href="#" class="post__category">CS:GO</a>
							<h3 class="post__title"><a href="interview.html">Top 20 CS:GO players of 2020 according to HOTFLIX.tv</a></h3>
							<div class="post__meta">
								<span class="post__date"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M256,64C150,64,64,150,64,256s86,192,192,192,192-86,192-192S362,64,256,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><polyline points='256 128 256 272 352 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg> 3 hours ago</span>
								<span class="post__comments"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z' style='fill:none;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11' style='fill:none;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg> 50</span>
							</div>
						</div>
					</div>
				</div> -->
				<!-- end video post -->

				
				<!-- paginator -->
				<div class="col-12">
					<div class="paginator">
						<div class="paginator__counter">
							1 trên 1
						</div>

						<ul class="paginator__wrap">
							<li class="paginator__item paginator__item--prev">
								<a href="#">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='244 400 100 256 244 112' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/><line x1='120' y1='256' x2='412' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
								</a>
							</li>
							<li class="paginator__item paginator__item--active"><a href="#">1</a></li>
							<li class="paginator__item"><a href="#">2</a></li>
							<li class="paginator__item"><a href="#">3</a></li>
							<li class="paginator__item paginator__item--next">
								<a href="#">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='268 112 412 256 268 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/><line x1='392' y1='256' x2='100' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</section>
	<!-- end section -->
@endsection