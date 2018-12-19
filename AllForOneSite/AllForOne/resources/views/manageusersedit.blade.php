@extends('layouts.admin')

@section('content')
<div class="wrapper">
        <!-- Sidebar Holder -->
       
        @include('layouts.sidebar')
        
        <!-- Page Content Holder -->
        <div id="content">
                @include('layouts.icon')
            <nav class="navbar navbar-default">
            <div class="container-fluid" style="padding: 3%;">
        <form action="{{ route('manage-users') }}" method="post" id="main_form">
                {{csrf_field()}}
            <div class="col col-sm-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name: </label>
                        <div class="col-sm-9">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $users['id'] }}" >
                        <input type="text" class="form-control" id="name" name="name" value="{{ $users['name'] }}" placeholder="Enter name to update it" >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email: </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $users['email'] }}" placeholder="Enter email to update it" >
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9 ">    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Admin: </label>
                                    <div class="col-sm-3">
                                            <input type="hidden" value="0" name="admin">
                                        <input type="checkbox" class="icheckbox-primary form-control" name="admin"
                                            data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="{{ $users['admin'] }}"
                                            @if (isset($users) && $users->admin == true) checked @endif
                                                />
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-6"> 
                                <div class="form-group">
                                        <label class="col-sm-4 control-label">Banned: </label>
                                        <div class="col-sm-3">
                                                <input type="hidden" value="0" name="banned">
                                            <input type="checkbox" class="icheckbox-primary form-control" name="banned"
                                                data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="{{ $users['banned'] }}"
                                                @if (isset($users) && $users->banned == true) checked @endif
                                                    />
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>    
                    </div>
                   
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary pull-right" type="submit" name="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
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

