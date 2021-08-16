@extends('layout.app')
@section('content')
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Hồ sơ</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="{{ route('Home')}}">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Hồ sơ</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	
	<!-- section -->
	<section class="section section--last">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="profile">
						<div class="profile__user">
							<div class="profile__avatar">
								<img src="img/user.svg" alt="">
							</div>
							<div class="profile__meta">
								<h3>{{ $user->username }}</h3>
							</div>
						</div>

						<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Thanh toán</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Cài đặt</a>
							</li>
						</ul>

						<a href="{{ route('Logout')}}"class="profile__logout" type="button">
							<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256' fill='none' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/></svg>
							<span>Đăng xuất</span>
						</a>
					</div>
				</div>
			</div>	
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel">
					<div class="row">
						<div class="col-12">
							<div class="table-responsive table-responsive--border">
								<table class="profile__table">
									<thead>
										<tr>
											<th>#</th>
											<th><a href="#">Sản phẩm</th>
											<th><a href="#" class="active">Tiêu đề</th>
											<th><a href="#">Nhà phát hành</th>
											<th><a href="#" class="active">Ngày mua</th>
											<th><a href="#">Giá</th>
											<th><a href="#">Trạng thái</th>
										</tr>
									</thead>

									<tbody>
									@foreach($products as $key => $product)
										<tr>
											<td>{{ ++$key }}</a></td>
											<td>
												<div class="profile__img">
													<img width="100px" height="140px" src="{{ asset('uploads/'.$product->image ) }}" alt="">
												</div>
											</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->developer }}</td>
											<td>{{ $product->day_purchan }}</td>
											<td><span class="profile__price">{{ number_format($product->price) }}</span></td>
											<td><span class="profile__status"><a href="#"><u>Tải xuống</u></a></span></td>
										</tr>
									@endforeach	
									</tbody>
								</table>
							</div>
						</div>

						<!-- paginator -->
						<div class="col-12">
							<div class="paginator">
								<div class="paginator__counter">
									1 form 1
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

				<div class="tab-pane fade" id="tab-2" role="tabpanel">
					<div class="row">
						<!-- details form -->
						<div class="col-12 col-lg-6" >
							<form action="{{ route('change_Info') }}" class="form" method="post" style="width: 625px;height: 320px;">
								@csrf
								<div class="row"> 
									<div class="col-12" >
										<h4 class="form__title">Thông tin tài khoản</h4>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="username">Tài khoản</label>
										<p style="color: white;padding: initial; margin: 10px;">{{ $user->username }}</p>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="email">Địa chỉ email</label>
										<p style="color: white;padding: initial; margin: 10px;">{{ $user->email }}</p>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="firstname">Họ</label>
										<input id="firstname" type="text" name="firstname" class="form__input" value="{{ $user->firstname }}">
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="lastname">Tên</label>
										<input id="lastname" type="text" name="lastname" class="form__input" value="{{ $user->lastname }}">
									</div>

									<div class="col-12">
										<button class="form__btn" type="submit">Cập nhật</button>
									</div>
								</div>
							</form>
						</div>
						<!-- end details form -->

						<!-- password form -->
						<div class="col-12 col-lg-6">
							<form action="#" class="form" style="width: 625px;height: 320px;"> 
								<div class="row">
									<div class="col-12">
										<h4 class="form__title">Thay đổi mật khẩu</h4>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="oldpass">Mật khẩu cũ</label>
										<input id="oldpass" type="password" name="oldpass" class="form__input">
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="newpass">Mật khẩu mới</label>
										<input id="newpass" type="password" name="newpass" class="form__input">
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<label class="form__label" for="confirmpass">Xác nhận mật khẩu mới</label>
										<input id="confirmpass" type="password" name="confirmpass" class="form__input">
									</div>

									

									<div class="col-12">
										<button class="form__btn" type="button">Lưu thay đổi</button>
									</div>
								</div>
							</form>
						</div>
						<!-- end password form -->
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end section -->
@endsection