@extends('layout.admin')

@section('content')

<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
    <li class="breadcrumb-item active">Sản Phẩm</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Chỉnh sửa sản phẩm {{ $product->name }} 
    </div>
    <div class="card-body">
        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="name">Tên - name :</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" require>
            </div>

            <div class="form-group mb-2">
                <label for="trailer">Đường đẫn video - trailer:</label>
                <input type="text" name="trailer" class="form-control" id="trailer" value="{{ $product->trailer }}">
            </div>

			<div class="form-group mb-2">
                <label for="release">Ngày phát hành - release:</label>
                <input type="text" name="release" class="form-control" id="release" value="{{ $product->release }}">
				{{ $errors->first('trailer') }}
            </div>

			<div class="form-group mb-2">
                <label for="price">Giá - price:</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ $product->price }}">
                {{ $errors->first('trailer') }}
            </div>

			<div class="form-group mb-2">
                <label for="saleoff">Giảm giá - saleoff:</label>
                <input type="text" name="saleoff" class="form-control" id="saleoff" value="{{ $product->saleoff }}">
            </div>

			<div class="form-group mb-2">
			<label for="">Nền tảng - platforms:</label><br>
                <?php foreach( $platforms as $platform ):?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                        type="checkbox" 
                        value="<?= $platform->id; ?>" 
                        id="platform_<?= $platform->id; ?>"
                        name="type_platforms[]"
                        >
                    <label class="form-check-label" for="platform_<?= $platform->id; ?>">
                       <?= $platform->name; ?>
                    </label>
                </div>
                <?php endforeach;?>
            </div>

			<div class="form-group mb-2">
                <label for="developer">Nhà phát triển - developer:</label>
                <input type="text" name="developer" class="form-control" id="developer" value="{{ $product->developer }}">
                {{ $errors->first('trailer') }}
            </div>

			<div class="form-group mb-2">
                <label for="publisher">Nhà xuất bản - publisher:</label>
                <input type="text" name="publisher" class="form-control" id="publisher" value="{{ $product->publisher }}">
                {{ $errors->first('trailer') }}
            </div>

			<div class="form-group mb-2">
                <label for="describe">Mô Tả - describe:</label>
                <textarea class="form-control" name="describe" id="describe" rows="3" value="">{{ $product->describe }}</textarea>
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputFile">Ảnh chính - image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="exampleInputFile" name="image"><br>
                        <img width="150px" src="{{ asset('uploads/'.$product->image ) }}">
                    </div>
                </div>

                <label for="exampleInputFile">Ảnh phụ - extra_image</label>
                <div class="input-group mb-2">
                    <ul>
                    <li><input type="file" class="form-control-file" id="exampleInputFile" name="images[]">
                    
                    <li><input type="file" class="form-control-file" id="exampleInputFile" name="images[]"></li>
                    <li><input type="file" class="form-control-file" id="exampleInputFile" name="images[]"></li>
                    <li><input type="file" class="form-control-file" id="exampleInputFile" name="images[]"></li>
                    </ul>
                </div>
            </div>

			<div class="form-group mb-2">
                <label for="status">Trạng thái - status:</label>
                <select class="form-control"name="status" >
                @foreach($status as $statu)
                <option value="{{ $statu->id }}">{{ $statu->statut }}</option>
                @endforeach
				</select> 
            </div>

			<div class="form-group mb-2">
                <label for="system_minium">Cấu hình tối thiểu - system_minium:</label>
				<select class="form-control" name="system_minium" >
                @foreach($miniums as $minium)
                <option value="{{ $minium->id }}">{{ $minium->title }}</option>
                @endforeach
				</select> 
            </div>

			<div class="form-group mb-2">
                <label for="system_require">Cấu hình phù hợp - system_require:</label>
                <select class="form-control"  name="system_require" >
                @foreach($requires as $require)
                <option value="{{ $require->id }}">{{ $require->title }}</option>
                @endforeach
				</select> 
            </div>   

			       

            <div class="form-group mb-2">
			<label for="">Thể loại:</label><br>
                <?php foreach( $types as $type ):?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                        type="checkbox" 
                        value="<?= $type->id; ?>" 
                        id="type_<?= $type->id; ?>"
                        name="types[]"
                        >
                    <label class="form-check-label" for="type_<?= $type->id; ?>">
                       <?= $type->name; ?>
                    </label>
                </div>
                <?php endforeach;?>
            </div>

            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary" value="Lưu">
                <a href="{{ route('products.index') }}" class="btn btn-danger">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection