@extends('layouts.admin.index')
@section('main')

    <div class="container">
        <h1 style="text-align:center">Thêm mới cửa hàng </h1>
        <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Dòng thứ hai: Tên sản phẩm, Danh mục và Hình ảnh -->
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Tên cửa hàng">
                </div>
                <div class="form-group col-sm">
                    <input type="file" class="form-control" id="image" name="image" required placeholder="Hình ảnh cửa hàng">
                </div>
            </div>
            <div class="row">
                <!-- Dòng đầu tiên: Giá, Khối lượng, Kích thước -->
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="latitude" name="latitude" required placeholder="Vĩ độ">
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="longitude" name="longitude" required placeholder="Kinh độ">
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="phone" name="phone" required placeholder="Số điện thoại">
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="address" name="address" required placeholder="Địa chỉ">
                </div>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-dark">Thêm mới cửa hàng</button>  
            </div>
        </form>
    </div>
 

@endsection