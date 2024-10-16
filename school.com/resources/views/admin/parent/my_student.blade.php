@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent student List({{$getparent->name}} {{$getparent->last_name}})</h1>
                    </div>
                    {{--                    <div class="col-sm-6" style="text-align: right">--}}
                    {{--                        <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Add New parent</a>--}}
                    {{--                    </div>--}}
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
                            <div class="card-header">
                                <h3 class="card-title">Search student</h3>
                            </div>
                            <form method="get" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Student Id</label>
                                            <input type="text" class="form-control" name="id" id="id"
                                                   value="{{Request::get('id')}}" placeholder=" Student Id">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{Request::get('name')}}" placeholder=" name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>last_name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   value="{{Request::get('last_name')}}" placeholder=" last_name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   value="{{Request::get('email')}}" placeholder=" email">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;">
                                                Search
                                            </button>
                                            <a href="{{url('admin/parent/my_student/'.$parent_id)}}"
                                               class="btn btn-success" style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        @if(!empty($getSearchStudent))
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">student list</h3>
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
                                        @foreach($getSearchStudent as $value)
                                            <tr>
                                                <td>{{$value->id}}</td>
                                                <td>{{$value->name}}{{$value->last_name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->parent_name}}</td>
                                                <td>{{$value->created_at}}</td>
                                                <td style="min-width: 150px">
                                                    <a href="{{url('admin/student/assign_student_parent/'.$value->id.'/'.$parent_id)}}"
                                                       class="btn btn-primary btn-sm">Add Student to Parent</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">parents student list</h3>
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
                                            <td style="min-width: 150px">
                                                <a href="{{url('admin/student/assign_student_parent_delete/'.$value->id)}}"
                                                   class="btn btn-primary btn-sm">Delete</a>

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
