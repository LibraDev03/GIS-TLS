@extends('layouts.admin.index') 
@section('main')
    <div class="container">
        <br>
        <h1 style="text-align:center">Chỉnh sửa sản phẩm</h1>
        <br>
        <form action="{{ route('shop.update', $shops->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <!-- Dòng thứ nhất: Tên sản phẩm, Danh mục và Hình ảnh -->
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="name" name="name" value="" required placeholder="{{ $shops->name}}">
                </div>
                <div class="form-group col-sm">
                    <input type="file" class="form-control" id="image" name="image" placeholder="Hình ảnh sản phẩm">
                </div>
            </div>

            <div class="row">
                <!-- Dòng thứ hai: Giá, Khối lượng, Kích thước -->
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="latitude" name="latitude" value="" required placeholder="{{$shops->latitude}}">
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="longitude" name="longitude" value="" required placeholder="{{$shops->longitude}}">
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="phone" name="phone" value="" required placeholder="{{$shops->phone}}">
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" id="address" name="address" value="" required placeholder="{{$shops->address}}">
                </div>
            </div>

            <div class="col text-center">
                <button type="submit" class="btn btn-dark">Chỉnh sửa cửa hàng</button>  
            </div>
        </form>
    </div>
@endsection
