@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('global/vendor/icheck/icheck.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/dateimepicker/jquery.datetimepicker.min.css')}}">
@endsection

@section('content');
<div class="page-main container">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session('update'))
                        <div class="mt-5 alert alert-success">
                            <strong>{{ Session('update') }}</strong>
                        </div>
                    @endif
                    @if (count($errors))
                        <div class="mt-5 alert alert-danger">
                            @foreach($errors->all() as $error)
                                <strong>{{ $error }}</strong>
                                <br>
                            @endforeach
                        </div>
                    @endif
                    <div class="profile-holder">
                        <div class="profile-people-holder">
                            <div class="profile-name">
                                <h3>Profile settings</h3>
                                <p>Update your profile password and notifications settings</p>
                            </div>
                        </div>
                        <div class="profile-settings-holder">

                            <form class="form-horizontal profile-update" method="POST" action="{{ route('profile') }}">
                                {{csrf_field()}}
                                <div class="form-group clearfix {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="col-sm-12 control-label">
                                        <label for="profile_password">Change profile-name</label>
                                        <span class="text-helper">Enter a name if you want to change it</span>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{$users['name']}}" placeholder="Enter name to update it">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group clearfix {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-sm-12 control-label">
                                        <label for="profile_password">Change email</label>
                                        <span class="text-helper">Enter a email if you want to change it</span>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{$users['email']}}" placeholder="Enter email to update it">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group clearfix {{ $errors->has('password') || Session('noMatchPassword') ? ' has-error' : '' }}">
                                    <div class="col-sm-12 control-label">
                                        <label for="profile_password">Change password</label>
                                        <span class="text-helper">Only enter a password if you want to change it</span>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <input type="hidden" name="id" value="{{ ($users['id']) }}">
                                        <input type="password" class="form-control" id="password" name="password"
                                               value="" placeholder="Enter actually password ">
                                        @if ($errors->has('password') || Session('noMatchPassword'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }} <br> {{ Session('noMatchPassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group clearfix {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password_confirmation" value=""
                                               name="password_confirmation" placeholder="Enter the new password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-btns clearfix">
                                    <button class="btn btn-primary" type="submit" name="submit">submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>

        /* DO NOT USE THIS */
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700);

        html,
        body {
            font-family: "Open Sans", "Helvetica Neue", Arial, Helvetica, sans-serif;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }


        /* END OF DO NOT USE THIS */

        img {
            max-width: 100%;
            height: auto;
        }


        /* Buttons */

        .btn-primary {
            display: block;
            clear: both;
            width: 100%;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border: none;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
        }

        .btn-primary:focus,
        .btn-primary:hover,
        .btn:active:focus {
            outline: none;
        }

        .form-horizontal .control-label {
            text-align: left !important;
        }

        .form-group .control-label label {
            font-weight: 600;
            margin-bottom: 0px;
            padding-top: 5px;
        }

        .form-control {
            border-radius: 22px;
            border: 1px solid transparent;
            height: 44px;
            line-height: 44px;
            padding: 0 15px;
            -webkit-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.15);
            box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.15);
            -webkit-appearance: none;
        }

        .form-control:focus {
            border: 1px solid #00BCD4;
            -webkit-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.15);
            box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.15);
        }

        .text-helper {
            margin-top: 0.2em;
            font-size: 0.8em;
            display: block;
        }

        .form-group p {
            margin: 0;
        }

        /** PROFILE **/

        .profile-holder label,
        .profile-people-holder .profile-name h3 {
            color: #333333;
            font-weight: 600;
        }

        .profile-update .control-label {
            margin-bottom: 1em;
        }

        .profile-update .profile-email p,
        .profile-update .profile-email .btn {
            display: inline-block;
            margin: 0;
        }

        .profile-update .profile-email .btn {
            margin-left: 10px;
            border-radius: 25px;
            background-color: transparent;
            color: #888888;
            border: 1px solid #888888;
            padding: 5px 10px;
            width: auto;
        }

        .profile-update .profile-email .btn:active:focus,
        .profile-update .profile-email .btn:active:hover {
            background-color: #888888;
            color: #FFFFFF;
            border: 1px solid transparent;
        }

        .profile-people-holder {
            padding: 1.5em 0;
            border-bottom: 3px solid #00BCD4;
            margin-bottom: 1.5em;
        }

        .profile-people-holder .profile-picture {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background-color: #00BCD4;
            text-align: center;
            line-height: 75px;
            color: #FFF;
            margin: 0 auto;
        }

        .profile-people-holder .profile-picture span {
            font-size: 24px;
        }

        .profile-settings-holder form {
            padding-bottom: 1.5em;
            margin-bottom: 1.5em;
        }

        .form-btns {
            text-align: center;
            padding-top: 1.5em;
            margin-bottom: 1.5em;
        }

        .form-btns .btn {
            border-radius: 25px;
            background-color: transparent;
            color: #00BCD4;
            border: 2px solid #00BCD4;
        }

        .form-btns .btn:active {
             background-color: #00BCD4;
            color: #FFFFFF;
            border: 2px solid transparent;
        }

        .form-btns .btn:active:focus,
        .form-btns .btn:active:hover {
            background-color: #00BCD4;
            color: #FFFFFF;
            border: 2px solid transparent;
        }

        /** END PROFILE **/

        @media screen and (min-width: 640px) {
            .container-fluid {
                padding: 0 12.5%;
            }

            .btn-primary {
                clear: none;
                display: inline-block;
                width: auto;
                max-width: 100%;
            }
        }

        .form-control::-webkit-input-placeholder {
            opacity: 0.85;
        }

        .form-control:-moz-placeholder {
            opacity: 0.85;
        }

        .form-control::-moz-placeholder {
            opacity: 0.85;
        }

        .form-control:-ms-input-placeholder {
            opacity: 0.85;
        }

        .form-control::-ms-input-placeholder {
            opacity: 0.85;
        }

        .form-control:placeholder-shown {
            opacity: 0.85;
        }

        .site-navbar.navbar-inverse .navbar-container {
            background-color: transparent;
            width: 100% !important;
        }
    </style>
@endsection