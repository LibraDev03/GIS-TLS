<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()  {
        $shops = Shop::all();
        return view('client.home', compact('shops'));
    }

    public function search() {
        $shops = Shop::all();
        if ($key = request()->key) {
            $data = Shop::where('name', 'like', '%' . $key . '%')->orderBy('id', 'DESC')->get();
        }
        return view('client.search', compact('data', 'shops'));
    }


}
