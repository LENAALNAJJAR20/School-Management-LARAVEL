@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add New parent</h1>
                    </div>
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>first_name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{old('name')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('name')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>last_nasm</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   value="{{old('last_name')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('last_name')}}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">Select gender</option>
                                                <option {{(old('gender')=='Male')? 'selected':''}} value="Male">Male
                                                </option>
                                                <option {{(old('gender')=='Female')? 'selected':''}} value="Female">
                                                    Female
                                                </option>
                                                <div style="color: red"> {{$errors->first('gender')}}</div>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>mobile_number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                   id="mobile_number" value="{{old('mobile_number')}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('mobile_number')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>profile_pic</label>
                                            <input type="file" class="form-control" name="profile_pic" id="profile_pic"
                                                   value="{{old('profile_pic')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('profile_pic')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="occupation"
                                                   value="{{old('occupation')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('occupation')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>address</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                   value="{{old('address')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('address')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="">Select status</option>
                                                <option {{(old('status')==0)? 'selected':''}} value="0">Active</option>
                                                <option {{(old('status')==1)? 'selected':''}} value="1">InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-group col-md-6">
                                        <label>email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{old('email')}}" placeholder="Enter email">
                                        <div style="color: red"> {{$errors->first('email')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Password">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>

                    </div>

                </div>
        </section>
    </div>
@endsection
