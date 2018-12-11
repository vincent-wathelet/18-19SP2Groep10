@extends('layouts.appnonav')
@section('pageAssets')
@endsection
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 ">
                <a class="btn btn-sq-lg btn-success col-sm-2 " href="{{route('allevents')}}"><div></br><i class="far fa-calendar-alt fa-5x"></i></br><p>All Events</p></div></a>
                <a class="btn btn-sq-lg btn-success col-sm-2 offset-sm-1"  href="{{asset('myEntries')}}"><div ></br><i class="far fa-calendar-check fa-5x"></i></br><p>My Entries</p></div></a>
                <a class="btn btn-sq-lg btn-warning col-sm-2 offset-sm-1 text-white"  href=""><div ></br><i class="far fa-star fa-5x"></i></br><p>My Ratings</p></div></a>
                <a class="btn btn-sq-lg btn-danger col-sm-2 offset-sm-1"  href="{{ url('/logout') }}" ><div ></br><i class="fas fa-sign-out-alt fa-5x"></i></br><p>Logout</p></div></a>
            </div>
        </div>
    <br/>
        <div class="row mt-5">
            <div class="col-lg-12 ">
                <a class="btn btn-sq-lg btn-success col-sm-2 " href="{{asset('myevents')}}"><div></br><i class="fas fa-tasks  fa-5x"></i></br><p>My Events</p></div></a>
                <a class="btn btn-sq-lg btn-info col-sm-2  offset-sm-1" href=""><div></br><i class="far fa-bell fa-5x"></i></br><p>Notifications</p></div></a>
                <a class="btn btn-sq-lg btn-primary col-sm-2  offset-sm-1" href=""><div></br><i class="fas fa-user-alt fa-5x"></i></br><p>My Account</p></div></a>
                <a class="btn btn-sq-lg btn-dark col-sm-2  offset-sm-1" href=""><div></br><i class="fas fa-sliders-h fa-5x"></i></br><p>Admin</p></div></a>
            </div>
        </div>

</div>
@endsection
