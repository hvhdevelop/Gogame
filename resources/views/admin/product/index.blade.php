@extends('layout.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
  </ol>
</nav>
<form action="{{ route('products.index')}}" method="get">
	<div class="input-group md-form form-sm form-2 mb-2">
	<input class="form-control my-0 py-1 lime-border" name="search" type="text" placeholder="Tên sản phẩm" aria-label="Search" value="{{$search }}">
	<div class="input-group-append">
		<span class="input-group-text lime lighten-2" id="basic-text1">
			<button type="submit" class="btn btn-primary">Tìm kiếm</button></span>
	</div>
	
	</div>
</form>
<div class="card">
  <div class="card-body">
	<div class="row">
		<div class="col-9">
		<a href="{{ route('products.create') }}" class="btn btn-dark">Thêm</a>
		</div>
		<div class="col-3">
		<p class="fs-4">{{ count($products) }} trong tổng số {{ $count_product}} sản phẩm</p>
		</div>		
	</div>		
  </div>
  @if (Session::has('success'))
		<div>
			<p class="text-success">{{ Session::get('success') }}</p>
		</div>
	@endif
	@if (Session::has('delete'))
		<div>
			<p class="text-danger">{{ Session::get('delete') }}</p>
		</div>
	@endif
  <div class="card-body">
	<table class="table table-bordered table-dark">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Sản phẩm</th>
		<th scope="col">Giá</th>
		<th scope="col">Khuyến mãi</th>
		<th scope="col">Giảm giá</th>
		<th scope="col">Nhà phát triển</th>
		<th scope="col">Nền tảng</th>
		<th scope="col">Lần cuối cập nhật</th>
		<th scope="col">Chi tiết</th>
		<th scope="col">Cập nhật</th>
		<th scope="col">Xóa</th>
		</tr>
	</thead>
	<tbody>
	@foreach($products as $key => $product )
	<?php   
		$platforms = [];
		foreach ($product->platforms as $platform){
			$platforms[]=$platform->name;
		}

		$platforms = implode(' - ',$platforms);
	?>
		<tr>
		<th scope="row">{{ ++$key }}</th>
		<td>{{ $product->name }}</td>
		<td>{{ number_format($product->price).'đ'}}</td>
		<td><?php if($product->saleoff ){ echo number_format($product->saleoff).' %';} ?></td>
		<td><?php if($product->aftersaleoff ){ echo number_format($product->aftersaleoff).'đ';} ?></td> 
		<td>{{ $product->developer }}</td>
		<td>{{ $platforms }}</td>
		<td>{{ $product->updated_at }}</td>
		<td><a href="{{ route( 'products.show', $product->id ) }}" class="btn btn-info">Chi tiết</a></td>
		<td><a href="{{ route( 'products.edit', $product->id ) }}" class="btn btn-warning">Chỉnh sửa</a></td>
		<td>
		<form action="{{ route( 'products.destroy', $product->id ) }}" method="post">                                          
			@csrf
			@method('delete')
			<button type="submit" class="btn btn-danger" onclick="return confirm(' Bạn chắc chắn muốn xóa không? ')">Xóa</button>
			</form>
		</td>
		</tr>
		@endforeach
			</tbody>
		</table>
	</div>
	
</div>
<div aria-label="Page navigation">
    	 {{ $products->links() }}
     </div>
				


@endsection

