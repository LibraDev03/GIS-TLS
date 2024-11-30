<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shop.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif,webp',
        ]);

        $data = $request->only('name','latitude','longitude','phone','address');

        $img_name = $request->image->hashName();
        $request->image->move(public_path('assets/images/shop'), $img_name);
        $data['image']  = $img_name;
        
        // dd($data);
        
        if(Shop::create($data)){
            return redirect()->route('shop.index')->with('suc', 'Thêm mới sản phẩm thành công');
        }else{
            return redirect()->route('shop.index')->with('fail', 'Thêm mới sản phẩm thất bại');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shops = Shop::find($id);
        return view('admin.shop.edit', compact('shops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shop = Shop::find($id);

        $data = $request->validate([
            'name' => 'nullable|unique:shops',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp'
        ]);

        $data = $request->only('name','latitude','longitude','phone','address');

        // dd($data);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($shop->image) {
                $oldImagePath = public_path('assets/images/shop/' . $shop->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Xóa ảnh cũ
                }
            }
            
            $img_name = $request->image->hashName();
            $request->image->move(public_path('assets/images/shop'), $img_name);
            $data['image'] = $img_name; // Cập nhật tên ảnh mới
        } else {
            // Nếu không có ảnh mới, giữ lại tên ảnh cũ
            $data['image'] = $shop->image;
        }

        // dd($data); 

        if($shop->update($data)) {
            if($request->has('other_image')){
                foreach ($shop as $images) {
                    $imagePath = public_path('assets/images/shop' . $images->image);
        
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // Xóa ảnh khỏi thư mục
                    }
        
                    $images->delete(); // Xóa bản ghi ảnh khỏi database
                }
            }
            return redirect()->route('shop.index')->with('suc', 'sửa sản phẩm thành công');
        }else{
            return redirect()->back()->with('fail', 'Sửa sản phẩm không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = shop::findOrFail($id);
        
        $shop->delete();
        
        return redirect()->route('shop.index')->with('suc', 'Xóa sản phẩm thành công');
    }
}
