@extends('layout.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item">Người dùng</li>
    <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
  </ol>
</nav>
	
<p>Danh sách người dùng :</p>
	
<div class="card">
  <div class="card-body">
	<table class="table table-bordered table-dark">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Tên</th>
		<th scope="col">E-mail</th>
		<th scope="col">Thao tác</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		@foreach($users as $key => $user)
	
		<th scope="row">{{ ++$key }}</th>
		<td>{{ $user->username }}</td>
		<td>{{ $user->email }}</td>
		<td>
		<form action="{{ route( 'users.destroy', $user->id ) }}" method="post">                                          
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


@endsection

