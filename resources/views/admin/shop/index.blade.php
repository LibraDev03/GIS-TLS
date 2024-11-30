@extends('layouts.admin.index')

@section('main')
    <div class="d-flex"><a href="{{ route('shop.create') }}" class="btn btn-dark mx-auto m-3 ">Thêm cửa hàng </a></div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên cửa hàng</th>
                <th scope="col">Vĩ độ</th>
                <th scope="col">Kinh độ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col" class="description-column">Địa chỉ</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                <tr>
                    <th scope="row">{{ $shop->id }}</th>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->latitude }}</td>
                    <td>{{ $shop->longitude }}</td>
                    <td>{{ $shop->phone }}</td>
                    <td>{{ $shop->address }}</td>
                    <td><img src="{{ asset('assets/images/shop/' . $shop->image) }}" alt="" width="50px"></td>
                    <td>
                    <a href="{{ route('shop.edit', $shop->id) }}" class="btn btn-dark">Edit</a>
                    <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" style="display:inline;" onsubmit=" return confirm('Are you sure')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark">Delete</button>
                    </form>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .description-column {
            width: 100px;
            height: auto;
            overflow: hidden; /* Ẩn phần nội dung tràn */
            text-overflow: ellipsis; /* Hiển thị dấu ba chấm nếu nội dung quá dài */
        }
    </style>
@endsection