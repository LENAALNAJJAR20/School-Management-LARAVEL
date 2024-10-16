<?php

namespace App\Http\Controllers;

use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\User;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SubjectController extends Controller
{
//    public function __construct(protected SubjectRepositoryInterface $repository){
//
//    }
    public function __construct(protected SubjectRepository $repository)
    {
    }

    public function list(Request $request)
    {
        return view('admin.subject.list', [
            'getRecord' => $this->repository->getRecord(
                $request->only('name', 'type')
            )
        ]);
    }

    public function add()
    {
        return view('admin.subject.add');
    }

    public function insert(request $request)
    {
        $save = new SubjectModel();
        $save->name = $request->name;
        $save->type = $request->type;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('/admin/subject/list')->with('success', 'Subject added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {

        $save = SubjectModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->save();
        return redirect('/admin/subject/list')->with('success', 'Subject update successfully');
    }

    public function delete($id)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', 'Subject deleted successfully');
    }

    public function mySubject()
    {
//        dd(Auth::user()->class_id);
        $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
        return view('student.my_subject', $data);
    }

    public function ParentStudentSubject($student_id)
    {
        $user = User::getSingle($student_id);
        $data['getUser'] = $user;
        $data['getRecord'] = ClassSubjectModel::MySubject($user->class_id);
        return view('parent.my_student_subject', $data);
    }
}
