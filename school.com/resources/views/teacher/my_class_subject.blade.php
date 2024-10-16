@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>my Class & Subject</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>
        @include('_message')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">my Class & Subject</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th> Class Name</th>
                        <th>Subject Name</th>
                        <th>Subject Type</th>
                        <th>Created_at</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($getRecord as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->class_name}}</td>
                            <td>{{$value->subject_name}}</td>
                            <td>{{$value->subject_type}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                <a href="{{url('teacher/my_class_subject/class_timetable/'.$value->class_id.'/'.$value->
                                                                   subject_id )}}"
                                   class="btn btn-primary">My Class Timetable </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
    </div>
@endsection
