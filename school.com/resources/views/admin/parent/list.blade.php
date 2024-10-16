@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Add New parent</a>
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
                                <h3 class="card-title">Search parent</h3>
                            </div>
                            <form method="get" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
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
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;">
                                                Search
                                            </button>
                                            <a href="{{url('admin/parent/list')}}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">parents</h3>
                            </div>
                            <div class="card-body p-0" style="overflow: auto">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>gender</th>
                                        <th>mobile_number</th>
                                        <th>occupation</th>
                                        <th>address</th>
                                        <th>status</th>
                                        <th>Create_at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->mobile_number}}</td>
                                            <td>{{$value->occupation}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{($value->status==0)?'Active':'Inactive'}}</td>
                                            <td>{{$value->created_at}}</td>

                                            <td style="min-width: 150px">
                                                <a href="{{url('admin/parent/edit/'.$value->id)}}"
                                                   class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{url('admin/parent/delete/'.$value->id)}}"
                                                   class="btn btn-danger btn-sm">Delete</a>
                                                <a href="{{url('admin/parent/my_student/'.$value->id)}}"
                                                   class="btn btn-primary btn-sm">My student</a>
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
