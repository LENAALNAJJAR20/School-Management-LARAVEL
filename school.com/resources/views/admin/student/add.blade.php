@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add New Student</h1>
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
                                            <label>admission_number</label>
                                            <input type="text" class="form-control" name="admission_number"
                                                   id="admission_number" value="{{old('admission_number')}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('admission_number')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>roll_number</label>
                                            <input type="text" class="form-control" name="roll_number" id="roll_number"
                                                   value="{{old('roll_number')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('roll_number')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Class Name</label>
                                            <select class="form-control" name="class_id">
                                                <option value="">Select Class</option>
                                                @foreach($getClass as $class )
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach

                                            </select>
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
                                                   id="date_of_birth" value="{{old('date_of_birth')}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('date_of_birth')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>caste</label>
                                            <input type="text" class="form-control" name="caste" id="caste"
                                                   value="{{old('caste')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('caste')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>religion</label>
                                            <input type="text" class="form-control" name="religion" id="religion"
                                                   value="{{old('religion')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('religion')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>mobile_number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                   id="mobile_number" value="{{old('mobile_number')}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('mobile_number')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>admission_date</label>
                                            <input type="date" class="form-control" name="admission_date"
                                                   id="admission_date" value="{{old('admission_date')}}"
                                                   placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('admission_date')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>profile_pic</label>
                                            <input type="file" class="form-control" name="profile_pic" id="profile_pic"
                                                   value="{{old('profile_pic')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('profile_pic')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>blood_group</label>
                                            <input type="text" class="form-control" name="blood_group" id="blood_group"
                                                   value="{{old('blood_group')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('blood_group')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>height</label>
                                            <input type="text" class="form-control" name="height" id="height"
                                                   value="{{old('height')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('height')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>weight</label>
                                            <input type="text" class="form-control" name="weight" id="weight"
                                                   value="{{old('weight')}}" placeholder="Enter name">
                                            <div style="color: red"> {{$errors->first('weight')}}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>status</label>
                                            <select class="form-control" name="status">
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
