@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{url('admin/examinations/exam/add')}}" class="btn btn-primary">Add New Exam</a>
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
                                <h3 class="card-title">Search Exam</h3>
                            </div>
                            <form method="get" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label> Exam Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{Request::get('name')}}" placeholder=" name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;">
                                                Search
                                            </button>
                                            <a href="{{url('admin/examinations/exam/list')}}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Exam Name</th>
                                        <th>Note</th>
                                        <th>Created_By</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->note}}</td>
                                            <td>{{$value->created_name}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>
                                                <a href="{{url('admin/examinations/exam/edit/'.$value->id)}}"
                                                   class="btn btn-primary">Edit</a>
                                                <a href="{{url('admin/examinations/exam/delete/'.$value->id)}}"
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
