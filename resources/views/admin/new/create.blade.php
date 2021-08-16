@extends('layout.admin')

@section('content')

<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
    <li class="breadcrumb-item active">Tin tức</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Thêm Mới
    </div>
    <div class="card-body">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="title">Tiêu đề - title :</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" require>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputFile">Ảnh chính - image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="exampleInputFile" name="image">
                    </div>
                </div>

            </div>
            <div class="form-group mb-2">
                <label for="video">Đường đẫn video - video:</label>
                <input type="text" name="video" class="form-control" id="video" value="{{ old('video') }}">
            </div>
			<div class="form-group mb-2">
                <label for="body">Nội dung - body:</label>
                <textarea class="form-control" name="body" id="describe" rows="3">{{ old('body') }}</textarea>
            </div>		

            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary" value="Lưu">
                <a href="{{ route('news.index') }}" class="btn btn-danger">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection