<?php

namespace App\Http\Controllers;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function insert(request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required',

        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::Make($request->password);
        $user->user_type = 1;
//        SendWelcomeEmail::dispatch($user);
        $user->save();
        return redirect('/admin/admin/list')->with('success', 'Admin added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            //           return response()->json([
//
//            ]);
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required',
            'password' => 'required',

        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::Make($request->password);
        }
        $user->save();
        return redirect('/admin/admin/list')->with('success', 'Admin update successfully');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        if ($user) {
            $user->delete(); // This will permanently delete the record
            return redirect('/admin/admin/list')->with('success', 'Admin deleted successfully');
        } else {
            return redirect('/admin/admin/list')->with('error', 'Admin not found');
        }
    }

}
