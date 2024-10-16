<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        return view('admin.parent.list', $data);
    }

    public function add()
    {
        return view('admin.parent.add');
    }

    public function insert(request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|max:10',
            'address' => 'required|max:10',
            'occupation' => 'required|max:10',
            'name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);
        $parent = new User();
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->gender = trim($request->gender);
        $parent->mobile_number = trim($request->mobile_number);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $parent->profile_pic = $file->store('profile_pic', 'public');
        }
        $parent->email = trim($request->email);
        $parent->password = Hash::Make($request->password);
        $parent->user_type = 4;
        $parent->save();
        return redirect('/admin/parent/list')->with('success', 'parent added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('admin.parent.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|max:10',
            'address' => 'required|max:10',
            'occupation' => 'required|max:10',
            'name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'gender' => 'required|in:Male,Female',

        ]);
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $parent->date_of_birth = trim($request->date_of_birth);
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $parent->profile_pic = $file->store('profile_pic', 'public');
        }
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        if (!empty($request->password)) {
            $parent->password = Hash::Make($request->password);
        }
        $parent->user_type = 4;
        $parent->save();
        return redirect('/admin/parent/list')->with('success', 'student Update successfully');
    }

    public function delete($id)
    {
        $parent = User::getSingle($id);
        $parent->is_delete = 1;
        $parent->save();
        return redirect('/admin/parent/list')->with('success', 'student deleted successfully');
    }

    public function myStudent($id)
    {
        $data['getparent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        return view('admin.parent.my_student', $data);
    }

    public function AssignStudentParent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect()->back()->with('success', 'student assigned successfully');
    }

    public function AssignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();
        return redirect()->back()->with('success', 'student  successfully assign delete');
    }

    public function myStudentParent()
    {
        $id = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        return view('parent.my_student', $data);
    }
}
