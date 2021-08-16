@extends('layout.app')
@section('content')
@if (session('addtofavourite'))   
	<script>
	$( document ).ready(function(){
		alertify.message('{{ session('addtofavourite') }}');
	});
	</script>
@endif
<!-- home -->
<section class="section section--bg section--first" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title section__title--title"><b>Games</b> mua nhiều trong tháng</h2>

						<div class="section__nav-wrap">
							<button class="section__nav section__nav--bg section__nav--prev" type="button" data-nav="#carousel0">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='328 112 184 256 328 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>

							<button class="section__nav section__nav--bg section__nav--next" type="button" data-nav="#carousel0">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='184 112 328 256 184 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>
						</div>
					</div>
				</div>
				<!-- end title -->
			</div>
		</div>
 
		<!-- carousel -->
		<div class="owl-carousel section__carousel section__carousel--big" id="carousel0">
			<!-- big card -->
			@foreach( $most_buys as $product)
			<div class="card card--big">
				<a href="{{ route( 'product.detail', $product->id ) }}" class="card__cover">
				<img  width="240px" height="320px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
				</a>

				<div class="card__wrap">
					<div class="card__title">
						<h3><a href="{{ route( 'product.detail', $product->id ) }}">{{ $product->name }}</a></h3>
					</div>

					<ul class="card__list">
						<li><span>Ngày ra mắt:</span>{{ $product->release }}</li>
						<li><span>Nhà phát hành:</span>{{ $product->developer }}</li>
					</ul>

					<?php   
							$platforms = [];
							foreach ($product->platforms as $platform){
								$platforms[]=$platform->icoi;
							}

							$platforms = implode('',$platforms);
							
						?>
						
						<ul class="card__platforms">
							<?php echo $platforms; ?>
						</ul>

					<div class="card__price">
					<span>
									<?php if($product->aftersaleoff ){ echo number_format($product->aftersaleoff).'đ';}
									else if($product->price == 0){echo 'Miễn phí';}else { echo number_format($product->price).'đ';} ?>
								</span>
									<s><?php if($product->aftersaleoff ){ echo number_format($product->price).'đ';} ?></s>
									<b><?php if($product->saleoff ){echo 'Giảm '.$product->saleoff.'%';} ?></b>
					</div>

					<div class="card__actions">
						<a href="{{ route('Checkout', $product->id ) }} " class="card__buy" type="button">Mua ngay</a>						
						<a href="{{ route('AddFavorites', $product->id)}}" class="card__favorite" type="button">
							<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
						</a>
					</div>
				</div>
			</div>
			<!-- end big card -->
			@endforeach
			
		</div>
		<!-- end carousel -->
	</section>
	<!-- end home -->

	<!-- section -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title">Mới cập nhật</h2>

						<div class="section__nav-wrap">
							<a href="catalog.html" class="section__view">Xem tất cả</a>

							<button class="section__nav section__nav--prev" type="button" data-nav="#carousel1">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='328 112 184 256 328 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>

							<button class="section__nav section__nav--next" type="button" data-nav="#carousel1">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='184 112 328 256 184 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>
						</div>
					</div>
				</div>
				<!-- end title -->
			</div>
		</div>

		<!-- carousel -->
		<div class="owl-carousel section__carousel section__carousel--catalog" id="carousel1">
			<!-- card -->
			@foreach( $product_createds as $product)
			<div class="card">
			<a href="{{ route( 'product.detail', $product->id ) }}" class="card__cover">
							<img  width="232px" height="310px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
							<span class="card__new">{{ $product->statuts->statut }}</span>
						</a>
						<?php   
							$platforms = [];
							foreach ($product->platforms as $platform){
								$platforms[]=$platform->icoi;
							}

							$platforms = implode('',$platforms);
							
						?>
						
						<ul class="card__platforms">
							<?php echo $platforms; ?>
						</ul>
						
						<div class="card__title">
							<h3><a href="{{ route( 'product.detail', $product->id ) }}">{{ $product->name }}</a></h3>
							<span><?php if($product->price == 0 ){echo 'Free';}else{ echo number_format($product->price).'đ';} ?></span>
						</div>

						<div class="card__actions">
							@if( $product->status == 1)
							<a href="{{ route('Checkout', $product->id ) }} " class="card__buy" type="button">Mua ngay</a>
							@else
							<a href="{{ route('Checkout', $product->id ) }} " class="card__buy" type="button">Đặt trước</a>
							@endif
							<a href="{{ route('AddFavorites', $product->id)}}" class="card__favorite" type="button">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
							</a>
				</div>
			</div>
			<!-- end card -->
			@endforeach
			
		</div>
		<!-- end carousel -->
	</section>
	<!-- end section -->

	<!-- section -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title section__title--pre">Phổ biến</h2>

						<div class="section__nav-wrap">
							<a href="catalog.html" class="section__view">Xem tất cả</a>

							<button class="section__nav section__nav--prev" type="button" data-nav="#carousel2">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='328 112 184 256 328 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>

							<button class="section__nav section__nav--next" type="button" data-nav="#carousel2">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='184 112 328 256 184 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>
						</div>
					</div>
				</div>
				<!-- end title -->
			</div>
		</div>

		<!-- carousel -->
		<div class="owl-carousel section__carousel section__carousel--catalog" id="carousel2">
		@foreach( $products as $product)
			<div class="card">
			<a href="{{ route( 'product.detail', $product->id ) }}" class="card__cover">
							<img  width="232px" height="310px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
							<span class="card__new">{{ $product->statuts->statut }}</span>
						</a>
						<?php   
							$platforms = [];
							foreach ($product->platforms as $platform){
								$platforms[]=$platform->icoi;
							}

							$platforms = implode('',$platforms);
							
						?>
						
						<ul class="card__platforms">
							<?php echo $platforms; ?>
						</ul>
						
						<div class="card__title">
							<h3><a href="{{ route( 'product.detail', $product->id ) }}">{{ $product->name }}</a></h3>
							<span><?php if($product->price == 0 ){echo 'Free';}else{ echo number_format($product->price).'đ';} ?></span>
						</div>

						<div class="card__actions">
							@if( $product->status == 1)
							<a href="{{ route('Checkout', $product->id ) }}" class="card__buy" type="button">Mua ngay</a>
							@else
							<a href="{{ route('Checkout', $product->id ) }}" class="card__buy" type="button">Đặt trước</a>
							@endif
							<a href="{{ route('AddFavorites', $product->id)}}" class="card__favorite" type="button">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
							</a>
				</div>
			</div>
			<!-- end card -->
			@endforeach

			
		</div>
		<!-- end carousel -->
	</section>
	<!-- end section -->

	

	<!-- section -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap section__title-wrap--single">
						<h2 class="section__title">Tin tức cập nhật</h2>

						<div class="section__nav-wrap">
							<a href="{{ route('News') }}" class="section__view">Xem tất cả</a>
						</div>
					</div>
				</div>
				<!-- end title -->
				@foreach ($bignews as $new)
				<!-- big post -->
				<div class="col-12 col-md-12 col-lg-6">
					<div class="post post--big">
						<a href="{{ route( 'new.detail', $new->id ) }}" class="post__img">
						<img  width="610px" height="370px" src="{{ asset('uploads/'.$new->image ) }}" alt="">
						</a>

						<div class="post__content">
							<h3 class="post__title"><a href="article.html">{{ $new->title }}</a></h3>
							<div class="post__meta">
								<span class="post__date"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M256,64C150,64,64,150,64,256s86,192,192,192,192-86,192-192S362,64,256,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><polyline points='256 128 256 272 352 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>{{ $new->created_at }}</span>
							</div>
						</div>
					</div>
				</div>
				<!-- end big post -->
				@endforeach
				
				@foreach( $smailnews as $new )
				<!-- video post -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="post">
					<a href="{{ route( 'new.detail', $new->id ) }}" class="post__img">
						<img  width="400px" height="220px" src="{{ asset('uploads/'.$new->image ) }}" alt="">
						</a>
						<div class="post__content">
							<h3 class="post__title"><a href="{{ route( 'new.detail', $new->id ) }}">{{ $new->title }}</a></h3>
							<div class="post__meta">
								<span class="post__date"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M256,64C150,64,64,150,64,256s86,192,192,192,192-86,192-192S362,64,256,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><polyline points='256 128 256 272 352 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>{{ $new->created_at }}</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach

				
			</div>
		</div>
	</section>
	<!-- end section -->

	<!-- section -->
	<!-- <div class="section section--last">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="partners owl-carousel">
						<a href="#" class="partners__img">
							<img src="img/partners/3docean-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/activeden-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/audiojungle-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/codecanyon-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/photodune-light-background.png" alt="">
						</a>

						<a href="#" class="partners__img">
							<img src="img/partners/themeforest-light-background.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- end section -->

@endsection