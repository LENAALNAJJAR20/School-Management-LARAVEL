@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{url('admin/subject/add')}}" class="btn btn-primary">Add New Subject</a>
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
                                <h3 class="card-title">Search Subject</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{Request::get('name')}}" placeholder=" name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Subject Type</label>
                                            <select class="form-control" name="type">
                                                <option
                                                    {{ (Request::get('type') =='Theory') ?'selected' : ''}} value="Theory">
                                                    Theory
                                                </option>
                                                <option
                                                    {{ (Request::get('type') =='Parctical') ?'selected' : ''}} value="Parctical">
                                                    Parctical
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;">
                                                Search
                                            </button>
                                            <a href="{{url('admin/subject/list')}}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Class</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>type</th>
                                        <th>Created_at</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>
                                                @if($value->status==0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{$value->type}}</td>
                                            <td>{{$value->created_by_name}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>
                                                <a href="{{url('admin/subject/edit/'.$value->id)}}"
                                                   class="btn btn-primary">Edit</a>
                                                <a href="{{url('admin/subject/delete/'.$value->id)}}"
                                                   class="btn btn-danger">Delete</a>
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
