@extends('layout.app')

@section('content')
<?php   
	$product_types	 	= implode(' - ', $product->types->pluck('name')->toArray() );
	$product_images 	= $product->images->pluck('image')->toArray();
	$system_minium 		= $product->system_miniums->first();
	$system_require 	= $product->system_requires->first();
	
?>
@if (session('addtofavourite'))   
	<script>
	$( document ).ready(function(){
		alertify.message('{{ session('addtofavourite') }}');
	});
	</script>
@endif
<!-- section -->
<section class="section section--first section--bg" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="details">
						<div class="details__head">
							<div class="details__cover">
								<img src="{{ asset('uploads/'.$product->image ) }}" alt="">
								<a href="{{ $product->trailer }}" class="details__trailer"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M112,111V401c0,17.44,17,28.52,31,20.16l247.9-148.37c12.12-7.25,12.12-26.33,0-33.58L143,90.84C129,82.48,112,93.56,112,111Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/></svg> <span>Xem trailer</span></a>
							</div>

							<div class="details__wrap">
								<h3 class="details__title">{{ $product->name }}</h3>

								<ul class="details__list">
									<li><span>Ngày phát hành:</span>{{ $product->release }}</li>
									<li><span>Thể loại:</span>{{ $product_types }}</li>
									<li><span>Nhà phát triển:</span>{{ $product->developer }}</li>
									<li><span>Nhà xuất bản:</span>{{ $product->publisher }}</li>
									
								</ul>

								<div class="details__text">
									<p>{{ $product->describe }}</p>
								</div>
							</div>
						</div>

						<div class="details__gallery">
							<div class="details__carousel owl-carousel" id="details__carousel">
							@foreach($product_images as $product_image)
								<a href="{{ asset('uploads/'.$product_image) }}" >
									<img  src="{{ asset('uploads/'.$product_image ) }}" alt="">
								</a>
							@endforeach
							</div>

							<button class="details__nav details__nav--prev" data-nav="#details__carousel" type="button">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='328 112 184 256 328 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>
							<button class="details__nav details__nav--next" data-nav="#details__carousel" type="button">
								<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='184 112 328 256 184 400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/></svg>
							</button>
						</div>

						<div class="details__cart">
							<span class="details__cart-title">Khả dụng trên hệ điều hành:</span>
							<?php   
							$platforms = [];
							foreach ($product->platforms as $platform){
								$platforms[]=$platform->icoi;
							}
							$platforms = implode('',$platforms);							
							?>
							<ul class="details__platforms">
							<?php echo $platforms; ?>								
							</ul>

							<span class="details__cart-title">Giá:</span>
							<div class="details__price">
								<span>
									<?php if($product->aftersaleoff ){ echo number_format($product->aftersaleoff).'đ';}
									else if($product->price == 0){echo 'Miễn phí';}else { echo number_format($product->price).'đ';} ?>
								</span>
									<s><?php if($product->aftersaleoff ){ echo number_format($product->price).'đ';} ?></s>
									<b><?php if($product->saleoff ){echo 'Giảm '.$product->saleoff.'%';} ?></b>
							</div>

							<div class="details__actions">
								<a href="{{ route('Checkout', $product->id ) }}" class="details__buy" type="button"><?php if($product->price == 0 ){echo 'Tải ngay';}else{ echo 'Mua ngay';} ?></a>

								<a href="{{ route('AddFavorites', $product->id)}}" class="details__favorite" type="button">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>Thêm vào mục ưa thích
								</a>
							</div>
						</div>

						<div class="details__content">
							<div class="row">
								<div class="col-12 col-xl-4 order-xl-2">
									<!-- requirements -->
									<div class="requirements">
										<span class="requirements__title">Cấu hình Tối thiểu:</span>
										<ul class="requirements__list">
										
											<li><span>Hệ điều hành: </span> {{ $system_minium->os }}</li>
											<li><span>Vi xử lý:		</span> {{ $system_minium->processor }}</li>
											<li><span>Bố nhớ ram:	</span> {{ $system_minium->memory }}</li>
											<li><span>Card đồ họa:	</span> {{ $system_minium->graphic }}</li>
											<li><span>Card âm thanh:</span> {{ $system_minium->sound }}</li>
										
										</ul>

										<span class="requirements__title">Cấu hình đề nghị:</span>
										<ul class="requirements__list">
										
											<li><span>Hệ điều hành: </span> {{ $system_require->os }}</li>
											<li><span>Vi xử lý:		</span> {{ $system_require->processor }}</li>
											<li><span>Bố nhớ ram:	</span> {{ $system_require->memory }}</li>
											<li><span>Card đồ họa:	</span> {{ $system_require->graphic }}</li>
											<li><span>Card âm thanh:</span> {{ $system_require->sound }}</li>
									
										</ul>
									</div>
									<!-- end requirements -->
								</div>

								<div class="col-12 col-xl-8 order-xl-1">
									<!-- comments -->
									<div class="comments comments--details">
										<div class="comments__title">
											<h4>Đánh giá</h4>
											<span>5</span>
										</div>

										<ul class="comments__list">
											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="img/user.svg" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">30.08.2020, 17:53</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M320,458.16S304,464,256,464s-74-16-96-32H96a64,64,0,0,1-64-64V320a64,64,0,0,1,64-64h30a32.34,32.34,0,0,0,27.37-15.4S162,221.81,188,176.78,264,64,272,48c29,0,43,22,34,47.71-10.28,29.39-23.71,54.38-27.46,87.09-.54,4.78,3.14,12,7.95,12L416,205' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M416,271l-80-2c-20-1.84-32-12.4-32-30h0c0-17.6,14-28.84,32-30l80-4c17.6,0,32,16.4,32,34v.17A32,32,0,0,1,416,271Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><path d='M448,336l-112-2c-18-.84-32-12.41-32-30h0c0-17.61,14-28.86,32-30l112-2a32.1,32.1,0,0,1,32,32h0A32.1,32.1,0,0,1,448,336Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><path d='M400,464l-64-3c-21-1.84-32-11.4-32-29h0c0-17.6,14.4-30,32-30l64-2a32.09,32.09,0,0,1,32,32h0A32.09,32.09,0,0,1,400,464Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><path d='M432,400l-96-2c-19-.84-32-12.4-32-30h0c0-17.6,13-28.84,32-30l96-2a32.09,32.09,0,0,1,32,32h0A32.09,32.09,0,0,1,432,400Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/></svg> 12</button>

														<button type="button">7 <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M192,53.84S208,48,256,48s74,16,96,32h64a64,64,0,0,1,64,64v48a64,64,0,0,1-64,64H386a32.34,32.34,0,0,0-27.37,15.4S350,290.19,324,335.22,248,448,240,464c-29,0-43-22-34-47.71,10.28-29.39,23.71-54.38,27.46-87.09.54-4.78-3.14-12-8-12L96,307' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M96,241l80,2c20,1.84,32,12.4,32,30h0c0,17.6-14,28.84-32,30l-80,4c-17.6,0-32-16.4-32-34v-.17A32,32,0,0,1,96,241Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><path d='M64,176l112,2c18,.84,32,12.41,32,30h0c0,17.61-14,28.86-32,30L64,240a32.1,32.1,0,0,1-32-32h0A32.1,32.1,0,0,1,64,176Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><path d='M112,48l64,3c21,1.84,32,11.4,32,29h0c0,17.6-14.4,30-32,30l-64,2A32.09,32.09,0,0,1,80,80h0A32.09,32.09,0,0,1,112,48Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><path d='M80,112l96,2c19,.84,32,12.4,32,30h0c0,17.6-13,28.84-32,30l-96,2a32.09,32.09,0,0,1-32-32h0A32.09,32.09,0,0,1,80,112Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/></svg></button>
													</div>

													<button type="button"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='400 160 464 224 400 288' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M448,224H154C95.24,224,48,273.33,48,332v20' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg><span>Reply</span></button>
													<button type="button"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><polyline points='320 120 368 168 320 216' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M352,168H144a80.24,80.24,0,0,0-80,80v16' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='192 392 144 344 192 296' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M160,344H368a80.24,80.24,0,0,0,80-80V248' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg><span>Quote</span></button>
												</div>
											</li>

											
										</ul>

										<form action="#" class="form">
											<textarea id="text" name="text" class="form__textarea" placeholder="Add comment"></textarea>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
									<!-- end comments -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end section -->

	<!-- section -->
	<section class="section section--last">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap">
						<h2 class="section__title">Những game tương tự</h2>

						<div class="section__nav-wrap">

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
			@foreach($products as $product)
			<div class="card">
				<a href="{{ route( 'product.detail', $product->id ) }}" class="card__cover">
				<img  width="232px" height="310px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
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

@endsection