@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">My Student</h3>
                            </div>
                            <div class="card-body p-0" style="overflow: auto">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>student name</th>
                                        <th>Email</th>
                                        <th>parent name</th>
                                        <th>Create_at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}{{$value->last_name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->parent_name}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>
                                                <a href="{{url('parent/my_student/subject/'.$value->id )}}"
                                                   class="btn btn-success">Subject </a>
                                                <a href="{{url('parent/my_student/exam_timetable/'.$value->id )}}"
                                                   class="btn btn-primary">Exam TimeTable </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
@endsection
