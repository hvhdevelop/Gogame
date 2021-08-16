@extends('layout.app')
@section('content')
<!-- page title -->
<section class="section section--first section--last section--head" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Thanh toán</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="index.html">Trang chủ</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Thanh toán</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	
	<!-- section -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8">
					<!-- cart -->
					<div class="cart">
						<div class="table-responsive">
							<table class="cart__table">
								<thead>
									<tr>
										<th><a href="#">Sản phẩm </a></th>
										<th><a href="#" class="active">Tiêu đề</a></th>
										<th><a href="#">Nhà phát hành </a></th>
										<th><a href="#">Giá gốc</th>
										<th><a href="#">Giảm giá</th>
									</tr>
								</thead>

								<tbody>
								<form action="#" class="form">
									<tr>
										<td>
											<div>
												<img width="110px" height="150px" src="{{ asset('uploads/'.$product->image ) }}" >
											</div>
										</td>
										<td><a href="{{ route( 'product.detail', $product->id ) }}">{{ $product->name }}</a></td>
										<td>{{ $product->developer }}</td>
										<td><span class="cart__price">{{ number_format($product->price).'đ' }}</span></td>
										<td>
											<?php
												if($product->saleoff){ echo $product->saleoff.'%'; }else{ echo 'không';}
											?>
										</td>
									</tr>
								</form>
								</tbody>
							</table>
						</div>
						<div class="cart__info">
							<div class="cart__systems">
								
							</div>
							<div class="cart__total">
								<p>Thành tiền:</p>
								<span>
									<?php
										if($product->aftersaleoff){
										echo number_format($product->aftersaleoff).'đ';
										}else{
										echo number_format($product->price).'đ';
										}
									?>
								</span>
							</div>

							
						</div>						
					</div>
					<!-- end cart -->
				</div>

				<div class="col-12 col-lg-4">
					<!-- checkout -->
					<form action="#" class="form form--first form--coupon">
						<input type="text" class="form__input" placeholder="Mã giảm giá">
						<button type="button" class="form__btn">Cập nhật</button>
					</form>
					<!-- end checkout -->

					<!-- checkout -->
					
					<span class="form__text"><b>Phương thức thanh toán</b></span>
					<span class="form__text">
					Thanh toán bằng thẻ tín dụng hoặc thông qua internet banking. Không chấp nhận thanh toán dưới hình thức nào khác.
					Nếu gặp thắc mắc hãy xem <a href="{{ route('Help') }}">trợ giúp</a> hoặc <a href="{{ route('Contacts') }}">liên hệ</a> với chúng tôi.
					</span>
						<select name="systems" class="form__select">
							<option value="visa">VNpay</option>
							<option value="mastercard">Internet Banking</option>
							<option value="paypal">Visa/Credits</option>
						</select>
						
						<a href="{{ route('Purchans', $product->id)}}" type="button" class="form__btn">Xác nhận</a>
					</form>
					<!-- end checkout -->
				</div>
			</div>	
		</div>
	</div>
	<!-- end section -->
@endsection