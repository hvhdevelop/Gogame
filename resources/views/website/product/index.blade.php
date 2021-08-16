@extends('layout.app')
@section('content')
@if (session('addtofavourite'))   
	<script>
	$( document ).ready(function(){
		alertify.message('{{ session('addtofavourite') }}');
	});
	</script>
@endif
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Tất cả sản phẩm <span>( {{ $count_product}} sản phẩm)</span></h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.html">Trang chính</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Tất cả sản phẩm</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	
	<!-- section -->
	<section class="section section--catalog">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sort">
						

						<div class="filter__group filter__group--sort">
							<label for="sort" class="filter__label">Sắp xếp:</label>

							<div class="filter__select-wrap">
								<select name="sort" id="sort" class="filter__select">
									<option value="0">Vừa cập nhật</option>
									<option value="1">Mới nhất</option>
									<option value="2">Cũ nhất</option>
									<option value="3">Miễn phí</option>
									<option value="4">A - Z</option>
									<option value="5">Z - A</option>
								</select>
							</div>
						</div>

						<!-- <div class="sort__results">Kết quả tìm kiếm</div> -->
					</div>
				</div>
			</div>
			<!-- catalog -->
			<div class="row category">
			@foreach( $products as $product)

				<!-- card -->
				<div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xl-20">
					<div class="card card--catalog">
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
				</div>
				<!-- end card -->
				@endforeach
				<div aria-label="Page navigation">
					{{ $products->links() }}
				</div>
				<!-- paginator -->
				<div class="col-12">
				
					<div class="paginator">
						<div class="paginator__counter">
							1 from 1
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
			<!-- end catalog -->	
		</div>
	</section>
	<!-- end section -->

	<!-- section -->
	

@endsection