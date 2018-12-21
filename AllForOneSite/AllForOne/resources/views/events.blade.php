@extends('layout')
@section('content');
<!--
* events.blade.php
* Author: Abdelali Ez Zyn
* Last update: 20/12/2018
-->
<div class="page-main container">
    {{--<div class="page-header">--}}
    {{--<h1 class="page-title">Two Columns</h1>--}}
    {{--</div>--}}
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading padding-top-15">
                <div class="row">
                    <div class="col col-sm-10">
                        <h2 class="panel-title">My Events</h2>
                    </div>
                    <div class="col col-sm-2 padding-10">
                        <a href="{{asset('myevents/create')}}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>

            <div class="panel-body">

                <hr>
                <div class="table-responsive">
                    <table class="table table-striped font-size-16">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Date</td>
                            <td>Location</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($organizations as $org)
                        <tr>
                            <td>{{$org->event['naam']}}</td>
                            <td>{{substr($org->event['date'], 0, -9)}}</td>
                            <td>
                                <span>{{$org->event['lokaal']['lokaal']}}</span>
                            </td>
                            <td>
                                <a href="{{asset('myevents/edit/'.$org->event['id'])}}"  class="btn btn-sm btn-icon btn-pure btn-default"
                                        data-toggle="tooltip"
                                        data-original-title="Edit">
                                    <i class="icon glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="{{asset('myevents/show/'.$org->event['id'])}}" class="btn btn-sm btn-icon btn-pure btn-default"
                                        data-toggle="tooltip"
                                        data-original-title="view">
                                    <i class="icon glyphicon glyphicon-check" aria-hidden="true"></i>
                                </a>
                                <a href="{{asset('myevents/delete/'.$org->event['id'])}}" class="btn btn-sm btn-icon btn-pure btn-default"
                                        data-toggle="tooltip"
                                        data-original-title="Delete">
                                    <i class="icon glyphicon glyphicon-remove-circle" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('acceptUsers', $org->event['id']) }}" class="btn btn-sm btn-icon btn-pure btn-default"
                                        data-toggle="tooltip"
                                        data-original-title="Accept users">
                                    <i class="icon glyphicon glyphicon-user" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection