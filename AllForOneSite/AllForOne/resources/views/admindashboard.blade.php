@extends('layouts.admin')

@section('content')
<div class="wrapper">
        <!-- Sidebar Holder -->
       
      @include('layouts.sidebar')
      
      <!-- Page Content Holder -->
<div id="content">
      
      @include('layouts.icon')

      <nav class="navbar navbar-default">

      <div class="container-fluid">

        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $users }}</div>
                            <div>Total Users</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href={{ route('manage-users') }}> View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $eventstotal }}</div>
                            <div>Total Events</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href={{ route('edit-events') }}> View Details </a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$subscribe}}</div>
                            <div>Total Subscriptions</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href={{ route('edit-events') }}> View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                </div>
            </div>
</div>

<script>
    $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
        $("#sidebar").toggleClass("active");
        $(this).toggleClass("active");
        });
    });
</script> 
@endsection
