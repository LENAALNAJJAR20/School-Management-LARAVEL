@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Admin</h1>
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
                            <form method="post" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               value="{{old('name',$getRecord->name)}}" placeholder="Enter name">
                                        @error('name')
                                        <div style="color: red; font-weight: bold; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{old('email',$getRecord->email)}}" placeholder="Enter email">
                                        @error('email')
                                        <div style="color: red; font-weight: bold; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                        <div style="color: red"> {{$errors->first('email')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Password">
                                        @error('password')
                                        <div style="color: red; font-weight: bold; font-size: 13px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div>

                    </div>

                </div>
        </section>
    </div>
@endsection
