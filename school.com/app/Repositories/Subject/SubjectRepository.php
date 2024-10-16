<?php

namespace App\Repositories\Subject;

use App\Models\SubjectModel;
use Illuminate\Support\Facades\Request;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function getRecord(array $filters = [])
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by');
        if (!empty($filters['name'])) {
            $return = $return->where('subject.name', 'like', '%' . $filters['name'] . '%');
        }
        if (!empty($filters['type'])) {
            $return = $return->where('subject.type', 'like', '%' . $filters['type'] . '%');
        }
        return $return->where('subject.is_delete', '=', 0)
            ->orderBy('subject.id', 'DESC')
            ->paginate(6);
    }
}
