<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/homecss') }}">
</head>
<body>
	<div class="wrapper">
		<a href=""><div class="box a"><div class="icon"><img src="{{ URL::asset('icons/allevents.png') }}"/></div>All Events</div></a>
		<a href=""><div class="box b"><div class="icon"><img src="{{ URL::asset('icons/myentries.png') }}"/></div>My Entries</div></a>
		<a href=""><div class="box c"><div class="icon"><img src="{{ URL::asset('icons/myratings.png') }}" /></div>My Ratings</div></a>
		<a href=""><div class="box d"><div class="icon"><img src="{{ URL::asset('icons/logout.png') }}"/></div>Logout</div></a>
		<a href=""><div class="box e"><div class="icon"><img src="{{ URL::asset('icons/myevents.png') }}"/></div>My Events</div></a>
		<a href=""><div class="box f"><div class="icon"><img src="{{ URL::asset('icons/mynotifications.png') }}"/></div>Notifications</div></a>
		<a href=""><div class="box g"><div class="icon"><img src="{{ URL::asset('icons/myaccount.png') }}"/></div>My Account</div></a>
		<a href=""><div class="box i"><div class="icon"><img src="{{ URL::asset('icons/admin.png') }}"/></div>Admin</div></a>
	</div>
</body>
</html>