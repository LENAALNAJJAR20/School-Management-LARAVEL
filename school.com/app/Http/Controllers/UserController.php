<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function myAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        if (Auth::user()->user_type == 2) {
            return view('teacher.my_Account', $data);
        } else if (Auth::user()->user_type == 3) {
            return view('student.my_Account', $data);
        } else if (Auth::user()->user_type == 4) {
            return view('parent.my_Account', $data);
        }
    }

    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15',
            'marital_status' => 'max:50',
        ]);
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->email = trim($request->email);
        $teacher->user_type = 2;
        $teacher->save();
        return redirect()->back()->with('success', 'Account update successfully');
    }


    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:10',
            'caste' => 'max:10',
            'religion' => 'max:10',
            'height' => 'max:10',
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
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
        $student->user_type = 3;

        $student->save();
        return redirect()->back()->with('success', 'Account update successfully');
    }

    public function UpdateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10',
            'address' => 'max:10',
            'occupation' => 'max:10',
        ]);
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $parent->profile_pic = $file->store('profile_pic', 'public');
        }
        $parent->email = trim($request->email);
        $parent->user_type = 4;

        $parent->save();
        return redirect()->back()->with('success', 'My Account Update successfully');
    }


}
