<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
//        $data['getClass'] =ClassModel::getClass();
        return view('admin.teacher.add');
    }

    public function insert(request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10',
            'marital_status' => 'max:50',
            'name' => 'required',
            'password' => 'required|min:6',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'permanent_address' => 'required',
            'work_experience' => 'required',
            'note' => 'required',
            'status' => 'required',
            'qualification' => 'required',


        ]);
        $teacher = new User();
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $teacher->profile_pic = $file->store('profile_pic', 'public');
        }
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::Make($request->password);
        $teacher->user_type = 2;
        $teacher->save();
        return redirect('/admin/teacher/list')->with('success', 'teacher added successfully');
    }


    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('admin.teacher.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10',
            'marital_status' => 'max:50',
            'name' => 'required',
            'password' => 'required|min:6',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'permanent_address' => 'required',
            'work_experience' => 'required',
            'note' => 'required',
            'status' => 'required',
            'qualification' => 'required',

        ]);
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $teacher->profile_pic = $file->store('profile_pic', 'public');
        }
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::Make($request->password);
        $teacher->user_type = 2;
        $teacher->save();
        return redirect('/admin/teacher/list')->with('success', 'teacher update successfully');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect()->back()->with('success', 'teacher deleted successfully');
    }

}
