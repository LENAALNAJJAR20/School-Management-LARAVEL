<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getRecord();
        return view('admin.class.list', $data);
    }

    public function add()
    {
        return view('admin.class.add');
    }

    public function insert(request $request)
    {
        $class = new ClassModel();
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('/admin/class/list')->with('success', 'Class added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, request $request)
    {

        $save = ClassModel::getSingle($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->save();
        return redirect('/admin/class/list')->with('success', 'Class update successfully');
    }

    public function delete($id)
    {
        $save = ClassModel::getSingle($id);
        $save->is_delete = 1;
        if ($save) {
            $save->delete(); // This will permanently delete the record
            return redirect()->back()->with('success', 'Class deleted successfully');
        }
        $save->save();
    }

}
