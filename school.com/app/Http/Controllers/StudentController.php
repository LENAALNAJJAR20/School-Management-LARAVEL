<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        return view('admin.student.add', $data);
    }

    public function insert(request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'weight' => 'required|max:10',
            'blood_group' => 'required|max:10',
            'mobile_number' => 'required|max:10',
            'roll_number' => 'required|max:10',
            'caste' => 'required|max:10',
            'religion' => 'required|max:10',
            'height' => 'required|max:10',
            'name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);
        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $student->profile_pic = $file->store('profile_pic', 'public');
        }
        $student->email = trim($request->email);
        $student->password = Hash::Make($request->password);
        $student->user_type = 3;

        $student->save();
        return redirect('/admin/student/list')->with('success', 'student added successfully');
    }


    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            return view('admin.student.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'weight' => 'required|max:10',
            'blood_group' => 'required|max:10',
            'mobile_number' => 'required|max:10',
            'roll_number' => 'required|max:10',
            'caste' => 'required|max:10',
            'religion' => 'required|max:10',
            'height' => 'required|max:10',
            'name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $student->profile_pic = $file->store('profile_pic', 'public');
        }
        $student->email = trim($request->email);
        if (!empty($request->password)) {
            $student->password = Hash::Make($request->password);
        }
        $student->user_type = 3;

        $student->save();
        return redirect('/admin/student/list')->with('success', 'student Update successfully');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->delete();
        $user->save();
        return redirect('/admin/student/list')->with('success', 'student deleted successfully');
    }

    public function MyStudent()
    {
        $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
        return view('teacher.my_student', $data);
    }

}
