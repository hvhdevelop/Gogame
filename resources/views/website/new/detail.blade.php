@extends('layout.app')



@section('content')

	<!-- section -->
	<section class="section section--first section--bg" data-bg="img/bg.jpg">
		<div class="container">
			<!-- article -->
			<div class="article">
				<div class="row">
					<div class="col-12 col-xl-8">
						<!-- article content -->
						<div class="article__content">
							<a href="#" class="article__category">Bài viết</a>

							<span class="article__date"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M256,64C150,64,64,150,64,256s86,192,192,192,192-86,192-192S362,64,256,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><polyline points='256 128 256 272 352 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>{{$new->created_at}}</span>

							<h1>{{ $new->title }}</h1>

							{!! $new->video !!}

							<p>&nbsp;&nbsp;&nbsp;{{ $new->body }}</p>

						</div>
						<!-- end article content -->

						<!-- share -->
						<div class="share">
							<a href="#" class="share__link share__link--fb"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.56341 16.8197V8.65888H7.81615L8.11468 5.84663H5.56341L5.56724 4.43907C5.56724 3.70559 5.63693 3.31257 6.69042 3.31257H8.09873V0.5H5.84568C3.1394 0.5 2.18686 1.86425 2.18686 4.15848V5.84695H0.499939V8.6592H2.18686V16.8197H5.56341Z"/></svg> share</a>
							<a href="#" class="share__link share__link--tw"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.55075 3.19219L7.58223 3.71122L7.05762 3.64767C5.14804 3.40404 3.47978 2.57782 2.06334 1.1902L1.37085 0.501686L1.19248 1.01013C0.814766 2.14353 1.05609 3.34048 1.843 4.14552C2.26269 4.5904 2.16826 4.65396 1.4443 4.38914C1.19248 4.3044 0.972149 4.24085 0.951164 4.27263C0.877719 4.34677 1.12953 5.31069 1.32888 5.69202C1.60168 6.22165 2.15777 6.74068 2.76631 7.04787L3.28043 7.2915L2.67188 7.30209C2.08432 7.30209 2.06334 7.31268 2.12629 7.53512C2.33613 8.22364 3.16502 8.95452 4.08833 9.2723L4.73884 9.49474L4.17227 9.8337C3.33289 10.321 2.34663 10.5964 1.36036 10.6175C0.888211 10.6281 0.5 10.6705 0.5 10.7023C0.5 10.8082 1.78005 11.4014 2.52499 11.6344C4.75983 12.3229 7.41435 12.0264 9.40787 10.8506C10.8243 10.0138 12.2408 8.35075 12.9018 6.74068C13.2585 5.88269 13.6152 4.315 13.6152 3.56293C13.6152 3.07567 13.6467 3.01212 14.2343 2.42953C14.5805 2.09056 14.9058 1.71983 14.9687 1.6139C15.0737 1.41264 15.0632 1.41264 14.5281 1.59272C13.6362 1.91049 13.5103 1.86812 13.951 1.39146C14.2762 1.0525 14.6645 0.438131 14.6645 0.258058C14.6645 0.22628 14.5071 0.279243 14.3287 0.374576C14.1398 0.480501 13.7202 0.639389 13.4054 0.734722L12.8388 0.914795L12.3247 0.565241C12.0414 0.374576 11.6427 0.162725 11.4329 0.0991699C10.8978 -0.0491255 10.0794 -0.0279404 9.59673 0.14154C8.2852 0.618204 7.45632 1.84694 7.55075 3.19219Z"/></svg> tweet</a>
							<a href="#" class="share__link share__link--vk"><svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.78479 8.92255C8.78479 8.92255 9.07355 8.89106 9.22145 8.73512C9.35684 8.59224 9.35214 8.32262 9.35214 8.32262C9.35214 8.32262 9.33414 7.06361 9.92967 6.87771C10.5166 6.69489 11.2702 8.09524 12.07 8.63372C12.6741 9.04085 13.1327 8.95174 13.1327 8.95174L15.2699 8.92255C15.2699 8.92255 16.3874 8.85495 15.8576 7.99231C15.8137 7.92164 15.5485 7.35397 14.269 6.1879C12.9284 4.9673 13.1084 5.16472 14.7221 3.05305C15.705 1.76715 16.0978 0.982093 15.975 0.646407C15.8584 0.325317 15.1353 0.410582 15.1353 0.410582L12.7297 0.425177C12.7297 0.425177 12.5513 0.401365 12.419 0.478949C12.2899 0.554996 12.2061 0.732441 12.2061 0.732441C12.2061 0.732441 11.8258 1.72721 11.3179 2.57372C10.2466 4.35892 9.81855 4.4534 9.64326 4.34279C9.23554 4.08392 9.33727 3.30424 9.33727 2.75039C9.33727 1.01973 9.60491 0.298431 8.81687 0.111769C8.5555 0.0495478 8.36299 0.00883541 7.6939 0.00192196C6.83543 -0.00652779 6.10921 0.00499461 5.69758 0.202411C5.42369 0.333767 5.2124 0.627203 5.34152 0.644103C5.50038 0.664843 5.86036 0.739354 6.0513 0.994383C6.29781 1.32392 6.2892 2.06289 6.2892 2.06289C6.2892 2.06289 6.43084 4.10005 5.95818 4.35277C5.6342 4.52638 5.1897 4.17226 4.2342 2.55221C3.7451 1.7226 3.37573 0.805416 3.37573 0.805416C3.37573 0.805416 3.30451 0.634117 3.17696 0.541938C3.02279 0.430555 2.80759 0.395987 2.80759 0.395987L0.521729 0.410582C0.521729 0.410582 0.178185 0.4198 0.0521924 0.566519C-0.0597138 0.696338 0.0435842 0.965961 0.0435842 0.965961C0.0435842 0.965961 1.8333 5.07638 3.86013 7.1481C5.71871 9.04699 7.8285 8.92255 7.8285 8.92255H8.78479Z"/></svg> share</a>
						</div>
						<!-- end share -->

						<!-- comments -->
						<div class="comments">
							<div class="comments__title">
								<h4>Bình luận</h4>
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
								<textarea id="text" name="text" class="form__textarea" placeholder="Viết bình luận"></textarea>
								<button type="button" class="form__btn">Gửi</button>
							</form>
						</div>
						<!-- end comments -->
					</div>

					<div class="col-12 col-xl-4">
						<div class="sidebar">
							<div class="row">
								<div class="col-12 col-lg-6 col-xl-12">
									<!-- cards -->
									<ul class="list list--sidebar">
									@foreach($products as $product)
										<li class="list__item">
										<a class="list__cover" href="{{ route( 'product.detail', $product->id ) }}" >
											<img width="100px"  src="{{ asset('uploads/'.$product->image) }}" alt="">
										</a>

											<div class="list__wrap">
												<h3 class="list__title">
													<a href="{{ route( 'product.detail', $product->id ) }}">{{ $product->name }}</a>
												</h3>

												<div class="list__price">
												<span>
													<?php if($product->aftersaleoff ){ echo number_format($product->aftersaleoff).'đ';}
													else if($product->price == 0){echo 'Miễn phí';}else { echo number_format($product->price).'đ';} ?>
													</span>
													<s><?php if($product->aftersaleoff ){ echo number_format($product->price).'đ';} ?></s>
													<b><?php if($product->saleoff ){echo 'Giảm '.$product->saleoff.'%';} ?></b>
												</div>

												<a href="{{ route( 'product.detail', $product->id ) }}" class="list__buy" type="button">
													<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><line x1='256' y1='112' x2='256' y2='400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='400' y1='256' x2='112' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
												</a>
											</div>
										</li>
									@endforeach
									</ul>
									<!-- end cards -->
								</div>

								<div class="col-12 col-lg-6 col-xl-12">
									<!-- subscribe -->
									<form action="#" class="subscribe">
										<div class="subscribe__img">
											<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M441.6,171.61,266.87,85.37a24.57,24.57,0,0,0-21.74,0L70.4,171.61A40,40,0,0,0,48,207.39V392c0,22.09,18.14,40,40.52,40h335c22.38,0,40.52-17.91,40.52-40V207.39A40,40,0,0,0,441.6,171.61Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M397.33,368,268.07,267.46a24,24,0,0,0-29.47,0L109.33,368' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='309.33' y1='295' x2='445.33' y2='192' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='61.33' y1='192' x2='200.33' y2='297' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
										</div>
										<p class="subscribe__title">Quảng cáo</p>
										<p class="subscribe__text">Liên hệ với chúng tôi qua e-mail:hoviethung10b2@gmail.com<br> hoặc sđt: 0812300227.</p>
										<input type="text" class="form__input" placeholder="Email của bạn">
										<button type="button" class="form__btn">Gửi</button>
									</form>
									<!-- end subscribe -->
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<!-- end article -->
		</div>
	</section>
	<!-- end section -->

	<!-- section -->
	<section class="section section--last">
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<div class="section__title-wrap section__title-wrap--single">
						<h2 class="section__title">Tin tức khác</h2>

						<div class="section__nav-wrap">
							<a href="{{ route('News') }}" class="section__view">Xem tất cả</a>
						</div>
					</div>
				</div>
				<!-- end title -->
				@foreach($news as $new)
				<!-- video post -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="post">
					<a href="{{ route( 'new.detail', $new->id ) }}" class="post__img">
						<img  width="405px" height="230px" src="{{ asset('uploads/'.$new->image ) }}" alt="">
						</a>
						<div class="post__content">
							<h3 class="post__title"><a href="{{ route( 'new.detail', $new->id ) }}">{{ $new->title }}</a></h3>
							<div class="post__meta">
								<span class="post__date"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M256,64C150,64,64,150,64,256s86,192,192,192,192-86,192-192S362,64,256,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><polyline points='256 128 256 272 352 272' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>{{ $new->created_at }}</span>
							</div>
						</div>
					</div>
				</div>
				<!-- end video post -->
				@endforeach
			</div>
		</div>
	</section>
	<!-- end section -->

	@endsection