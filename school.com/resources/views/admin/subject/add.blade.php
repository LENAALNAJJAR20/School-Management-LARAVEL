@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add New Subject </h1>
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
                                        <label> Subject Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Enter  subject name">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Type</label>
                                        <select class="form-control" name="type">
                                            <option value="Theory">Theory</option>
                                            <option value="Parctical">Parctical</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="0">Active</option>
                                            <option value="1"> Inactive</option>

                                        </select>
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
