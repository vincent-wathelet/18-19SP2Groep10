<!-- Sidebar Holder -->
<nav id="sidebar">
        <ul class="list-unstyled components">
        <li class="{{ request()->is('admin-dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin-dashboard') }}" data-toggle="{{-- collapse --}}"><i class="fa fa-tachometer" aria-hidden="true"></i>
            Dashboard</a>
            {{--  <ul class="collapse list-unstyled" id="homeSubmenu">
            <li><a href="#">Home 1</a></li>     
            <li><a href="#">Home 2</a></li>
            <li><a href="#">Home 3</a></li>             
            </ul> --}}
        </li>
        <li class="{{ request()->is('edit-events') ? 'active' : '' }}">
            <a href="{{ asset('edit-events') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            Edit Event</a>
        </li>
        <li class="{{ request()->is('manage-users') ? 'active' : '' }}">
            <a href="{{ route('manage-users') }}"><i class="fa fa-user-o" aria-hidden="true"></i>
            Manage Users</a>
        </li>
        <li class="">
            <a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Setting</a>
        </li>
        </ul>
    </nav>
   