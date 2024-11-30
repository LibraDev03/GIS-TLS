<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|max:10',
            'gender' => 'required',
            'birthday' => 'required',
        ]);

        $data = $request->only('name','email','password','phone','gender','birthday');
        $data['password'] = bcrypt(request('password'));

        // dd($data);

        if(User::create($data)){
            return redirect()->route('user.index');
        }else{
            return redirect()->back();
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required',
            'gender' => 'required',
            'birthday' => 'required'
        ]);

        // dd($data);

        $user = User::find($id);
        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'password' => !empty($data['password']) ? bcrypt($data['password']) : $user->password
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('suc', 'Xóa người dùng thành công');
    }
}
