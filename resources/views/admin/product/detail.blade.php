@extends('layout.admin')

@section('content')
<?php   
	$system_minium 		= $product->system_miniums->first();
	$system_require 	= $product->system_requires->first();
	
?>
<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
    <li class="breadcrumb-item active">Sản Phẩm</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Chi tiết sản phẩm {{ $product->name }} 
    </div>
    <div class="card-body">
	    <table class="table table-bordered table-dark">
        <?php   
		    $platforms = [];
		    foreach ($product->platforms as $platform){
			    $platforms[]=$platform->name;
		    }

		    $platforms = implode(' - ',$platforms);
	    ?>
            <tr>
                <td class="col-3">Tên sản phẩm</td>
                <td class="col-9">{{ $product->name }}</td>
                <td rowspan="10"><img width="265px" height="350px" src="{{ asset('uploads/'.$product->image ) }}"></td>
            </tr>
            <tr>
                <td>Video trailer</td>
                <td><a href="{{ $product->trailer }}" target="_blank">{{ $product->trailer }}</a></td>
            </tr>
            <tr>
                <td>Ngày phát hành</td>
                <td>{{ $product->release }}</td>
            </tr>
            <tr>
                <td>Giá bán</td>
                <td><?php if($product->price){echo number_format($product->price).'đ';}else{echo 'Miễn phí';}  ?></td>
            </tr>
            <tr>
                <td>Khuyến mại</td>
                <td><?php if($product->saleoff ){ echo number_format($product->saleoff).' %';}else{ echo 'Không';} ?></td>
            </tr>
            <tr>
                <td>Giá sau khuyễn mãi</td>
                <td><?php if($product->aftersaleoff){echo number_format($product->aftersaleoff).'đ';}else{echo 'Không';}  ?></td>
            </tr>
            <tr>
                <td>Nền tảng</td>
                <td>{{ $platforms }}</td>
            </tr>
            <tr>
                <td>Nhà phát triển</td>
                <td>{{ $product->developer }}</td>
            </tr>
            <tr>
                <td>Nhà phát hành</td>
                <td>{{ $product->publisher }}</td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td colspan="2"><p>{{ $product->describe }}</p></td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td colspan="2">{{ $product->statuts->statut }}</td>
            </tr>
            <tr>
                <td>Cấu hình</td>
                <td colspan="2">
                    <table class="table table-bordered table-dark">
                        <tr>
                            <td></td>
                            <td class="col-6">Cấu hình tối thiểu</td>
                            <td class="col-6">Cấu hình đề nghị</td>
                        </tr>
                        <tr>
                            <td>Os</td>
                            <td>{{ $system_minium->os }}</td>
                            <td>{{ $system_require->os }}</td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td>{{ $system_minium->processor }}</td>
                            <td>{{ $system_require->processor }}</td>
                        </tr>
                        <tr>
                            <td>Memory</td>
                            <td>{{ $system_minium->memory }}</td>
                            <td>{{ $system_require->memory }}</td>
                        </tr>
                        <tr>
                            <td>Graphic</td>
                            <td>{{ $system_minium->graphic }}</td>
                            <td>{{ $system_require->graphic }}</td>
                        </tr>
                        <tr>
                            <td>Sound</td>
                            <td>{{ $system_minium->sound }}</td>
                            <td>{{ $system_require->sound }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
	    </table>
                <div class="mx-auto" style="width: 200px;">
                <a href="{{ route('products.index') }}" class="btn btn-primary" style="width: 200px;">Trở về</a>
        </div>
	</div>
</div>
@endsection