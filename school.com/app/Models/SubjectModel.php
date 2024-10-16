<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getSingle($id)
    {
        return SubjectModel::find($id);
    }

    static public function getSubject()
    {
        $return = SubjectModel::select('subject.*')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('subject.is_delete', '=', 0)
            ->where('subject.status', '=', 0)
            ->orderBy('subject.name', 'asc')
            ->get();
        return $return;
    }
}
