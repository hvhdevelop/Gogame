@extends('layout.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item">Sản phẩm</li>
    <li class="breadcrumb-item active" aria-current="page">Cấu hình</li>
  </ol>
</nav>
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
<p> Cấu hình tối thiểu:</p>
	
<div class="card">
  <div class="card-body">
		<a href="{{ route('systems.create') }}" class="btn btn-dark">Thêm cấu hình tối thiểu</a>
  </div>
  <div class="card-body">
	<table class="table table-bordered table-dark">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Tiêu đề</th>
		<th scope="col">Hệ điều hành</th>
		<th scope="col">Vi xử lý</th>
		<th scope="col">Bộ nhớ ram</th>
		<th scope="col">Card đồ họa</th>
		<th scope="col">Bộ nhớ trống</th>
		<th scope="col">Âm thanh</th>
		<th scope="col">Cập nhật</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		@foreach($system_miniums as $key => $system_minium )
	
		<th scope="row">{{ ++$key }}</th>
		<td>{{ $system_minium->title }}</td>
		<td>{{ $system_minium->os }}</td>
		<td>{{ $system_minium->processor }}</td>
		<td>{{ $system_minium->memory }}</td>
		<td>{{ $system_minium->graphic}}</td>
		<td>{{ $system_minium->stogare }}</td>
		<td>{{ $system_minium->sound }}</td>
		<td><a href="{{ route( 'systems.edit', $system_minium->id ) }}" class="btn btn-info">Chỉnh sửa</a>
		<form action="{{ route( 'systems.destroy', $system_minium->id ) }}" method="post">                                          
		@csrf
		@method('delete')
		<button class="btn btn-danger" onclick="return confirm(' Bạn chắc chắn muốn xóa không? ')">Xóa</button>
		</form>
		</td>
		</tr>
		@endforeach
			</tbody>
		</table>
	</div>
</div>

<p> Cấu hình đề nghị:</p>

<div class="card">
  <div class="card-body">
  <a href="{{ route('systemsplus.create') }}" class="btn btn-dark">Thêm cấu hình đề nghị</a>
  </div>
  <div class="card-body">
	<table class="table table-bordered table-dark">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Tiêu đề</th>
		<th scope="col">Hệ điều hành</th>
		<th scope="col">Vi xử lý</th>
		<th scope="col">Bộ nhớ ram</th>
		<th scope="col">Card đồ họa</th>
		<th scope="col">Bộ nhớ trống</th>
		<th scope="col">Âm thanh</th>
		<th scope="col">Cập nhật</th>
		</tr>
	</thead>
	<tbody>
	@foreach($system_requires as $key => $system_require )
	
	<th scope="row">{{ ++$key }}</th>
	<td>{{ $system_require->title }}</td>
	<td>{{ $system_require->os }}</td>
	<td>{{ $system_require->processor }}</td>
	<td>{{ $system_require->memory }}</td>
	<td>{{ $system_require->graphic}}</td>
	<td>{{ $system_require->stogare }}</td>
	<td>{{ $system_require->sound }}</td>
	<td><a href="{{ route( 'systemsplus.edit', $system_require->id ) }}" class="btn btn-info">Chỉnh sửa</a>
	<form action="{{ route( 'systemsplus.destroy', $system_require->id ) }}" method="post">                                          
	@csrf
	@method('delete')
	<button class="btn btn-danger" onclick="return confirm(' Bạn chắc chắn muốn xóa không? ')">Xóa</button>
	</form>
	</tr>
	@endforeach
		
			</tbody>
		</table>
	</div>
</div>



@endsection

