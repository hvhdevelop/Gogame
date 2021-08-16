@extends('layout.admin')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>

<div class="card text-center ">
  <div class="card-header bg-dark">
    Quản trị viên website GoGame
  </div>
  <div class="card-body bg-primary">
    <h5 class="card-title">Xin chào Admin website GoGame</h5>
    <p class="card-text">Quản lý mọi thứ trong trang web của bạn.</p>
    
  </div>
  <div class="card-footer text-muted bg-dark">
    GoGame
  </div>
</div>
<br>
<div class="row">
<div class="col-lg-3">
    <div class="card bg-dark" style="height:200px" >
      <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item active"><h5 class="card-title">Sản phẩm</h5></li>
            <li class="list-group-item"><p class="card-text">Thêm, cập nhật, xóa sản phẩm của website.</p></li>
            <li class="list-group-item"><a href="{{ route('products.index') }}" class="btn btn-primary">Quản lý sản phẩm</a></li>
        </ul>
      </div>
    </div>
</div>
<div class="col-lg-3">
<div class="card bg-dark" style="height:200px" >
      <div class="card-body">
          <ul class="list-group">
              <li class="list-group-item active"><h5 class="card-title">Cấu hình</h5></li>
              <li class="list-group-item"><p class="card-text">Quản lý cấu hình  cho sản phẩm.</p></li>
              <li class="list-group-item"><a href="{{ route('systems.index') }}" class="btn btn-primary">Quản lý cấu hình</a></li>
          </ul>       
      </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="card bg-dark" style="height:200px" >
      <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item active"><h5 class="card-title">Tin tức</h5></li>
            <li class="list-group-item"><p class="card-text">Quản lý bảng tin của website, thêm tin mới.</p></li>
            <li class="list-group-item"><a href="{{ route('news.index') }}" class="btn btn-primary">Quản lý tin tức</a></li>
        </ul>
      </div>
    </div>
</div>
<div class="col-lg-3">
  <div class="card bg-dark" style="height:200px" >
      <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item active"><h5 class="card-title">Người dùng</h5></li>
            <li class="list-group-item"><p class="card-text">Quản lý tài khoản người dùng truy cập.</p></li>
            <li class="list-group-item"> <a href="{{ route('users.index') }}" class="btn btn-primary">Quản lý người dùng</a></li>
        </ul>
      </div>
    </div>
</div>

</div>
@endsection

