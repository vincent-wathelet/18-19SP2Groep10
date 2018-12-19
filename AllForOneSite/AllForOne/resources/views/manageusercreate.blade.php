

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
     
                    <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                  
                                        {{-- <h3 class="panel-heading">Create User</h3> --}}
                        
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('manage-users-store') }}">
                                                {{ csrf_field() }}
                        
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Name</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                </div>   
                                                <div class="col-md-8">
                                                <div class="col-md-6">   
                                                    <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                                                        <label for="admin" class="col-md-4 control-label">Admin</label>
                            
                                                        <div class="col-md-6">
                                                            <input type="hidden" class="icheckbox-primary form-control" name="admin" value="0" >
                                                            <input type="checkbox" class="icheckbox-primary form-control" name="admin"
                                                            data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="1"
                                                            {{-- @if (isset($admins) && $admins->autoaccept == true) checked @endif --}}
                                                                />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group{{ $errors->has('banned') ? ' has-error' : '' }}">
                                                        <label for="banned" class="col-md-4 control-label">Banned</label>
                            
                                                        <div class="col-md-6">
                                                                <input type="hidden" class="icheckbox-primary form-control" name="banned" value="0" >
                                                                <input type="checkbox" class="icheckbox-primary form-control" name="banned"
                                                                data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="1">
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>
                        
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Create
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
<style>
input[type=checkbox], input[type=radio] {
    margin: 4px 0 0;
    margin-top: 1px\9;
    line-height: normal;
    width: 28%;
    height: 23px;
</style>
@endsection
