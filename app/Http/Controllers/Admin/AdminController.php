<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $user = User::all();
        $shop = Shop::all();
        $comment = Comment::all();
        return view('admin.dashboard', compact('user','shop','comment'));
    }
}
