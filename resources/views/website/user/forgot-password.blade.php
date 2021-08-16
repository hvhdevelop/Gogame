@extends('layout.user')

@section('content')

<!-- sign in -->
<div class="sign section--full-bg" data-bg="img/bg2.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="#" class="sign__form">
							<a href="{{ route('Home') }}" class="sign__logo">
								<img src="img/logo.svg" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email khôi phục mật khẩu">
							</div>
							
							<button class="sign__btn" type="button">Gửi</button>

							<span class="sign__text">Chúng tôi sẽ gửi mật khẩu đến E-mail của bạn</span>
							<span class="sign__text"> <a href="{{ route('SignIn') }}">Đăng nhập</a> | <a href="{{ route('SignUp') }}">Đăng Ký</a></span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end sign in -->

@endsection