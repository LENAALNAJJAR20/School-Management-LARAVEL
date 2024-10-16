@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>update Teacher</h1>
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
                                                   value="{{old('name',$getRecord->name)}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('name')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>last_nasm</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   value="{{old('last_name',$getRecord->last_name)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('last_name')}}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select gender</option>
                                                <option {{(old('gender')=='Male')? 'selected':''}} value="Male">Male
                                                </option>
                                                <option {{(old('gender')=='Female')? 'selected':''}} value="Female">
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>date_of_birth</label>
                                            <input type="date" class="form-control" name="date_of_birth"
                                                   id="date_of_birth"
                                                   value="{{old('date_of_birth',$getRecord->date_of_birth)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('date_of_birth')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>date_of_join</label>
                                            <input type="date" class="form-control" name="admission_date"
                                                   id="date_of_birth"
                                                   value="{{old('admission_date',$getRecord->admission_date)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('admission_date')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>mobile_number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                   id="mobile_number"
                                                   value="{{old('mobile_number',$getRecord->mobile_number)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('mobile_number')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>marital_status</label>
                                            <input type="text" class="form-control" name="marital_status"
                                                   id="admission_date"
                                                   value="{{old('marital_status',$getRecord->marital_status)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('marital_status')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>address</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                   value="{{old('address',$getRecord->address)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('height')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>permanent_address</label>
                                            <input type="text" class="form-control" name="permanent_address"
                                                   value="{{old('permanent_address',$getRecord->permanent_address)}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('permanent_address')}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>qualification</label>
                                        <input type="text" class="form-control" name="qualification"
                                               value="{{old('qualification',$getRecord->qualification)}}"
                                               placeholder="Enter name">
                                        <div style="color: red"> {{$errors->first('qualification')}}</div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>work_experience</label>
                                    <input type="text" class="form-control" name="work_experience"
                                           value="{{old('work_experience',$getRecord->work_experience)}}"
                                           placeholder="Enter name">
                                    <div style="color: red"> {{$errors->first('work_experience')}}</div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>note</label>
                                    <input type="text" class="form-control" name="note"
                                           value="{{old('note',$getRecord->note)}}" placeholder="Enter name">
                                    <div style="color: red"> {{$errors->first('note')}}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select status</option>
                                        <option {{(old('status')==0)? 'selected':''}} value="0">Active</option>
                                        <option {{(old('status')==1)? 'selected':''}} value="1">InActive</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{old('email',$getRecord->email)}}" placeholder="Enter email">
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
