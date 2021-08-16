@extends('layout.app')
@section('content')
@if (session('deletefavourite'))   
	<script>
	$( document ).ready(function(){
		alertify.message('{{ session('deletefavourite') }}');
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
						<h2 class="section__title">Yêu thích</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="{{ route('Home') }}">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Yêu thích</li>
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
							<div class="filter-wrap">
								<button class="filter-wrap__btn" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">Open filter</button>

								<div class="collapse filter-wrap__content" id="collapseFilter">
									<!-- filter -->
									<div class="filter">
										<h4 class="filter__title">Bộ lọc <button type="button">Xóa đánh dấu</button></h4>

										<div class="filter__group">
											<label class="filter__label">Từ khóa:</label>
											<input type="text" class="filter__input" placeholder="Keyword">
										</div>

										<div class="filter__group">
											<label for="sort" class="filter__label">Sắp xếp:</label>

											<div class="filter__select-wrap">
												<select name="sort" id="sort" class="filter__select">
													<option value="0">Tất cả</option>
													<option value="1">Mới nhất</option>
													<option value="2">Cũ nhất</option>
												</select>
											</div>
										</div>

										<div class="filter__group">
											<label class="filter__label">Nền tảng:</label>
											<ul class="filter__checkboxes">
												<li>
													<input id="type1" type="checkbox" name="type1" checked="">
													<label for="type1">Playstation</label>
												</li>
												<li>
													<input id="type2" type="checkbox" name="type2">
													<label for="type2">XBOX</label>
												</li>
												<li>
													<input id="type3" type="checkbox" name="type3">
													<label for="type3">Windows</label>
												</li>
												<li>
													<input id="type4" type="checkbox" name="type4">
													<label for="type4">Mac OS</label>
												</li>
											</ul>
										</div>

										<div class="filter__group">
											<label class="filter__label">Thể loại:</label>
											<ul class="filter__checkboxes">
												<li>
													<input id="type5" type="checkbox" name="type5" checked="">
													<label for="type5">Action</label>
												</li>
												<li>
													<input id="type6" type="checkbox" name="type6">
													<label for="type6">Adventure</label>
												</li>
												<li>
													<input id="type7" type="checkbox" name="type7" checked="">
													<label for="type7">Fighting</label>
												</li>
												<li>
													<input id="type8" type="checkbox" name="type8" checked="">
													<label for="type8">Flight simulation</label>
												</li>
												<li>
													<input id="type9" type="checkbox" name="type9">
													<label for="type9">Platform</label>
												</li>
												<li>
													<input id="type10" type="checkbox" name="type10">
													<label for="type10">Racing</label>
												</li>
												<li>
													<input id="type11" type="checkbox" name="type11">
													<label for="type11">RPG</label>
												</li>
												<li>
													<input id="type12" type="checkbox" name="type12">
													<label for="type12">Sports</label>
												</li>
												<li>
													<input id="type13" type="checkbox" name="type13">
													<label for="type13">Strategy</label>
												</li>
												<li>
													<input id="type14" type="checkbox" name="type14">
													<label for="type14">Survival horror</label>
												</li>
											</ul>
										</div>

										<div class="filter__group">
											<button class="filter__btn" type="button">Lọc</button>
										</div>
									</div>
									<!-- end filter -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end filter wrap -->

				<!-- content wrap -->
				<div class="col-12 col-lg-80">
					@if($products)
					<div class="row">
						<!-- card -->
						@foreach ( $products as $product)
						<div class="col-12 col-sm-6 col-md-4 col-xl-3">
							<div class="card card--catalog">
							<a href="{{ route( 'product.detail', $product->id ) }}" class="card__cover">
								<img  width="232px" height="310px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
							</a>
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

									<a href="{{ route('DeleteFavourites', $product->fv_id)}} "class="card__favorite card__favorite--delete" type="button">
										<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='80' y1='112' x2='432' y2='112' style='stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='256' y1='176' x2='256' y2='400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='184' y1='176' x2='192' y2='400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='328' y1='176' x2='320' y2='400' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									</a>
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforeach						
					</div>
				</div>
				<!-- end content wrap -->
				@else
				<p style="color: white;padding: 100px;font-size: x-large;text-align: center;">Danh sách yêu thích rỗng. Hãy thêm <a href="{{route('AllProducts')}}">sản phẩm</a> yêu thích ngay!</p>
				@endif
			</div>
			<!-- end catalog -->	
		</div>
	</section>
	<!-- end section -->

@endsection