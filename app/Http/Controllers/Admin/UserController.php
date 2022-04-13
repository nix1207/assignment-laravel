<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() 
    {
            $users = User::get();
            return view('admin.user.index', compact('users'));
    }

    public function updateStatus (Request $request)
    {
        $data = $request->all();
        // dd($data);
         User::where('id', $data['id'])->update([
           'status' => $data['status'] == 0 ? 1 : 0
         ]);
    }

    public function create() 
    {
        return view('admin.user.create');
    }

    public function store(UserStoreRequest $request) 
    {
        $data = $request->all();
        User::create([
            'name' => $data['name'], 
            'email' => $data['email'], 
            'birthday' => $data['birthday'],
            'status' => isset($data['status']) ? 1 : 0,
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->back()->with('success', 'Tạo mới tài khoản thành công');
    }

    public function edit(User $user) 
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->all();
        if($data['password'] == null) {
            User::where('id', $user->id)->update([
                'email' => $data['email'],
                'name' => $data['name'],
                'birthday' => $data['birthday'], 
                'status' => isset($data['status']) ? 1 : 0,
            ]);
        }
        else {
            User::where('id', $user->id)->update([
                'email' => $data['email'],
                'name' => $data['name'],
                'birthday' => $data['birthday'], 
                'status' => isset($data['status']) ? 1 : 0,
                'password' => Hash::make($data['password'])
            ]);
        }
        
        return redirect()->back()->with('success', 'Cập nhật tài khoản thành công');
    }

    public function delete(Request $request) 
    {
        $data = $request->all();
        
        User::where('id', $data['id'])->delete(); 

        return response()->json(['message' => 'Deleted']);
    }

    
}
