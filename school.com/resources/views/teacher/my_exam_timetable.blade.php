@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Exam Timetable </h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-12">
                @foreach($getRecord as $value)
                    <h2 style="font-size: 32px;margin-bottom: 15px;">Class : <span
                            style="color:cornflowerblue">{{$value['class_name']}}</span></h2>
                    @foreach($value['exam'] as $exam)
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Exam Name: {{$exam['exam_name']}}</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Exam Date</th>
                                        <th>start time</th>
                                        <th>end time</th>
                                        <th>Room Number</th>
                                        <th>Full Marks</th>
                                        <th>Passing Marks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exam['subject'] as $valueS)
                                        <tr>
                                            <th>{{$valueS['subject_name']}}</th>
                                            <td>{{$valueS['exam_date']}}</td>
                                            <td>{{!empty($valueS['start_time']) ? date('h:i A ',strtotime($valueS['start_time'])):''}}</td>
                                            <td>{{!empty($valueS['end_time']) ? date('h:i A ',strtotime($valueS['end_time'])):''}}</td>
                                            <td>{{$valueS['room_number']}}</td>
                                            <td>{{$valueS['full_marks']}}</td>
                                            <td>{{$valueS['passing_mark']}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
@endsection
