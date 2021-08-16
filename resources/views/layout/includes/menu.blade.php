<!-- header -->

<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<button class="header__menu" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>

							<a href="{{ route('Home') }}" class="header__logo">
								<img src="{{ url('/') }}/img/logo.svg" alt="">
							</a>

							<ul class="header__nav">
							<li class="header__nav-item">
									<a class="header__nav-link" href="{{ route('Home') }}">Trang chủ</a>
								</li>
								<li class="header__nav-item">									
									<a class="header__nav-link" href="{{route('AllProducts')}}">Tất cả sản phẩm</a>
								</li>
								<li class="header__nav-item">
									<a class="header__nav-link" href="{{ route('News') }}">Tin tức</a>
								</li>
								<li class="header__nav-item">
									<a class="header__nav-link" href="{{ route('Help') }}">Trợ giúp</a>
								</li>
								<li class="header__nav-item">
									<a class="header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><circle cx='256' cy='256' r='32' style='fill:none; stroke-miterlimit:10;stroke-width:32px'/><circle cx='416' cy='256' r='32' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><circle cx='96' cy='256' r='32' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/></svg>
									</a>

									<ul class="dropdown-menu header__nav-menu header__nav-menu--scroll" aria-labelledby="dropdownMenu3">
										<li><a href="{{ route('Favorites') }}">Yêu thích</a></li>
										<li><a href="{{ route('About') }}">Về chúng tôi</a></li>
										@if($cr_user)
										<li><a href="{{ route('Profile') }}">Tài khoản</a></li>
										@else
										<li><a href="{{ route('login') }}">Đăng nhập</a></li>
										<li><a href="{{ route('SignUp') }}">Đăng ký</a></li>
										<li><a href="{{ route('ForgotPassword') }}">Quên mật khẩu</a></li>
										@endif
										<li><a href="{{ route('Privacy') }}">Điều khoản</a></li>
										<li><a href="{{ route('Contacts') }}">Phản hồi</a></li>
										<li><a href="{{ route('Error404') }}">Lỗi 404</a></li>
									</ul>
								</li>
							</ul>

							<div class="header__actions">
								<div class="header__lang">
									<a class="header__lang-btn" href="#" role="button" id="dropdownMenuLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img src="{{ url('/') }}/img/flags/vietnam.jpg" alt="">
										<span>VN</span>
										<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M98,190.06,237.78,353.18a24,24,0,0,0,36.44,0L414,190.06c13.34-15.57,2.28-39.62-18.22-39.62H116.18C95.68,150.44,84.62,174.49,98,190.06Z'/></svg>
									</a>

									<ul class="dropdown-menu header__lang-menu" aria-labelledby="dropdownMenuLang">
										<li><a href="#"><img src="{{ url('/') }}/img/flags/uk.svg" alt=""><span>EN</span></a></li>
										
									</ul>
								</div>
								@if($cr_user)
								<a href="{{ route('Logout')}}" class="header__login">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='288 336 368 256 288 176' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='80' y1='256' x2='352' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									<span>Đăng xuất</span>
								</a>
								@else
								<a href="{{ route('login') }}" class="header__login">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='288 336 368 256 288 176' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='80' y1='256' x2='352' y2='256' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									<span>Đăng nhập</span>
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<form action="{{ route('Search') }}" class="header__form" method="post">
								<input type="text" name="input" class="header__input" placeholder="Tìm kiếm" autocomplete="off">
								@csrf
								<select class="header__select">
									<option value="$types">Tất cả thể loại</option>
									@foreach($types as $type)
									<option value="{{ $type->id }}">{{$type->name}}</option>
									@endforeach
								</select>
								<button class="header__btn" type="submit">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M221.09,64A157.09,157.09,0,1,0,378.18,221.09,157.1,157.1,0,0,0,221.09,64Z' style='fill:none;stroke-miterlimit:10;stroke-width:32px'/><line x1='338.29' y1='338.29' x2='448' y2='448' style='fill:none;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
								</button>
							</form>
							@if($cr_user)
							<div class="header__actions header__actions--2">
								<a href="{{ route('Favorites') }}" class="header__link">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									<span>Yêu thích</span>
								</a>

								<a href="{{ route('Profile') }}" class="header__link">
									<svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><circle cx='176' cy='416' r='16' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><circle cx='400' cy='416' r='16' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='48 80 112 80 160 352 416 352' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M160,288H409.44a8,8,0,0,0,7.85-6.43l28.8-144a8,8,0,0,0-7.85-9.57H128' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
									<span>Lịch sử mua hàng</span>
								</a>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->