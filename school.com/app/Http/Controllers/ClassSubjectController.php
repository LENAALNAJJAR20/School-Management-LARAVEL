<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        return view('admin.assign_subject.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }

            }
            return redirect('admin/assign_subject/list')->with('success', 'Class added successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occurred');
        }
    }

    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            return view('admin.assign_subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_subject/list')->with('success', 'Class update successfully');
    }

    public function delete($id)
    {
        $save = ClassSubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', 'Class deleted successfully');
    }

//    public function edit_single($id)
//    {
//        $getRecord = ClassSubjectModel::getSingle($id);
//        if (!empty($getRecord)) {
//            $data['getRecord'] = $getRecord;
//            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
//            $data['getClass'] = ClassModel::getClass();
//            $data['getSubject'] = SubjectModel::getSubject();
//            return view('admin.assign_subject.edit_single', $data);
//        } else {
//            abort(404);
//        }
//    }

//    public function update_single($id, request $request)
//    {
//        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
//        if (!empty($getAlreadyFirst)) {
//            $getAlreadyFirst->status = $request->status;
//            $getAlreadyFirst->save();
//            return redirect('admin/assign_subject/list')->with('success', 'Status Successfully update');
//
//        } else {
//            $save = ClassSubjectModel::getSingle($id);
//            $save->class_id = $request->class_id;
//            $save->subject_id = $request->subject_id;
//            $save->status = $request->status;
//            $save->created_by = Auth::user()->id;
//            $save->save();
//            return redirect('admin/assign_subject/list')->with('success', 'Subject  successfully Assign to Class');
//
//        }
//    }


}
