@extends('layout.app')
@section('content')
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Kết quả tìm kiếm: "{{ $input }}"<span>( {{ $count}} sản phẩm)</span></h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.html">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Tìm kiếm</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	<?php if( $count > 0): ?>
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
										<h4 class="filter__title">Bộ lọc<button type="button">Bỏ tất cả chọn</button></h4>

										<div class="filter__group">
											<label class="filter__label">Từ khóa tìm kiếm:</label>
											<input type="text" class="filter__input" placeholder="">
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
					<div class="row">
						<!-- card -->									
				@foreach( $products as $product)

					<!-- card -->
					<div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xl-20">
						<div class="card card--catalog">
							<a href="{{ route( 'product.detail', $product->id ) }}" class="card__cover">
								<img width="235px" height="310px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
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
								<button class="card__buy" type="button">Tải ngay</button>

								<button class="card__favorite" type="button">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
								</button>
							</div>
						</div>
						
					</div>
					<!-- end card -->
					@endforeach	
					<?php else: ?>
					
					<img width=100% src="img/notfound.png" width: 100%>
					
					<?php endif; ?>				
					</div>
				</div>
				<!-- end content wrap -->
				
			</div>
			<!-- end catalog -->	
		</div>
	</section>
	<!-- end section -->

@endsection