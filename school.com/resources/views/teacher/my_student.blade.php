@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student List</h1>
                    </div>

                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>
        @include('_message')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Students</h3>
            </div>
            <div class="card-body p-0" style="overflow: auto">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>student name</th>
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
