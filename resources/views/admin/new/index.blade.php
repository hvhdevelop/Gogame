@extends('layout.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bảng tin</li>
  </ol>
</nav>
<form action="{{ route('news.index')}}" method="get">
	<div class="input-group md-form form-sm form-2 mb-2">
	<input class="form-control my-0 py-1 lime-border" name="search" type="text" placeholder="Tiêu đề" aria-label="Search" value="{{$search }}">
	<div class="input-group-append">
		<span class="input-group-text lime lighten-2" id="basic-text1">
			<button type="submit" class="btn btn-primary">Tìm kiếm</button></span>
	</div>
	
	</div>
</form>
<div class="card">
  <div class="card-body">
	<a href="{{ route('news.create') }}" class="btn btn-dark">Thêm</a>
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
		<th scope="col">Tiêu đề</th>		
		<th scope="col">Ngày tạo</th>
		<th scope="col">Cập nhật</th>
		<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
	@foreach($news as $key => $new )
		<tr>
		<th scope="row">{{ $new->id }}</th>
		<td>{{ $new->title }}</td>
		<td>{{ $new->created_at }}</td> 
		<td><a href="{{ route( 'news.edit', $new->id ) }}" class="btn btn-info">Chỉnh sửa</a></td>
		<td>
		<form action="{{ route( 'news.destroy', $new->id ) }}" method="post">                                          
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
    	 {{ $news->links() }}
     </div>
				


@endsection

