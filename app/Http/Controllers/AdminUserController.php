<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.allusers', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.allusers')->with('message', 'Người dùng đã được cập nhật thành công.');
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->delete()) {
            return redirect()->route('admin.allusers')->with('message', 'Xóa người dùng thành công!');
        } else {
            return redirect()->route('admin.allusers')->with('error', 'Xóa người dùng thất bại!');
        }
    }

    public function create()
    {
        return view('admin.add_user');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('admin.allusers')->with('message', 'Thêm người dùng mới thành công!');
}
}
