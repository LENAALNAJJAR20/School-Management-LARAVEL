@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{url('admin/student/add')}}" class="btn btn-primary">Add New Student</a>
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
                            <div class="card-header">
                                <h3 class="card-title">Search Student</h3>
                            </div>
                            <form method="get" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{Request::get('name')}}" placeholder=" name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   value="{{Request::get('email')}}" placeholder=" name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>mobile_number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                   id="mobile_number" value="{{Request::get('mobile_number')}}"
                                                   placeholder=" name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>gender</label>
                                            <select class="form-control" name="gender">
                                                <option {{(Request('gender')=='Male')? 'selected':''}} value="Male">
                                                    Male
                                                </option>
                                                <option {{(Request('gender')=='Female')? 'selected':''}} value="Female">
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                        {{--                                        <div class="form-group col-md-3" >--}}
                                        {{--                                            <label >status</label>--}}
                                        {{--                                            <select class="form-control" name="status" >--}}
                                        {{--                                                <option {{(Request('status')==100)? 'selected':''}} value="100">Active</option>--}}
                                        {{--                                                <option {{(Request('status')==1)? 'selected':''}} value="1">Inactive</option>--}}
                                        {{--                                            </select>--}}
                                        {{--                                        </div>--}}

                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;">
                                                Search
                                            </button>
                                            <a href="{{url('admin/student/list')}}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">students</h3>
                            </div>
                            <div class="card-body p-0" style="overflow: auto">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>parent</th>
                                        <th>admission_number</th>
                                        <th>roll_number</th>
                                        <th>class</th>
                                        <th>gender</th>
                                        <th>date_of_birth</th>
                                        <th>caste</th>
                                        <th>religion</th>
                                        <th>mobile_number</th>
                                        <th>blood_group</th>
                                        <th>height</th>
                                        <th>weight</th>
                                        <th>admission_date</th>
                                        <th>Create_at</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->parent_name}} {{$value->parent_last}}</td>
                                            <td>{{$value->admission_number}}</td>
                                            <td>{{$value->roll_number}}</td>
                                            <td>{{$value->class_name}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->date_of_birth}}</td>
                                            <td>{{$value->caste}}</td>
                                            <td>{{$value->religion}}</td>
                                            <td>{{$value->mobile_number}}</td>
                                            <td>{{$value->blood_group}}</td>
                                            <td>{{$value->height}}</td>
                                            <td>{{$value->weight}}</td>
                                            <td>{{$value->admission_date}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{($value->status==0)?'Active':'Inactive'}}</td>
                                            <td style="min-width: 150px">
                                                <a href="{{url('admin/student/edit/'.$value->id)}}"
                                                   class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{url('admin/student/delete/'.$value->id)}}"
                                                   class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div style="float:right;padding: 5px">{{$getRecord->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
