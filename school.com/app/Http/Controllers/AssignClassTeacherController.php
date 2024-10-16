<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
    public function list()
    {
        $data ['getRecord'] = AssignClassTeacherModel::getRecord();
        return view('admin.assign_class_teacher.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        return view('admin.assign_class_teacher.add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
            return redirect('admin/assign_class_teacher/list')->with('success', ' Assign Class to Teacher  successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occurred');
        }
    }

    public function edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            return view('admin.assign_class_teacher.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {


        AssignClassTeacherModel::deleteTeacher($request->class_id);
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_class_teacher/list')->with('success', '  Update Assign Class to Teacher  successfully');
    }

    public function edit_single($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            return view('admin.assign_class_teacher.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function update_single($id, request $request)
    {
        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $request->teacher_id);
        if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_class_teacher/list')->with('success', 'Status Successfully update');

        } else {
            $save = AssignClassTeacherModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->teacher_id = $request->teacher_id;
            $save->status = $request->status;
            $save->created_by = Auth::user()->id;
            $save->save();
            return redirect('admin/assign_class_teacher/list')->with('success', '  Assign Class to teacher  successfully');

        }

    }

    public function delete($id)
    {
        $save = AssignClassTeacherModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', ' deleted  assign class to teacher successfully delete');
    }

    public function MyClassSubject()
    {
        $data['getRecord'] = AssignClassTeacherModel::getClassSubject(Auth::user()->id);
        return view('teacher.my_class_subject', $data);
    }

}
