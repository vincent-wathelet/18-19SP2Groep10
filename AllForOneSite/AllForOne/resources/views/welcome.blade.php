@extends("layouts.app")

@section("content")


    <div class="container text-center jumbotron mt-5 ">
        <h1>Welcome to All For One</h1>
        <p>l
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis gravida lorem, nec feugiat velit.
            Aliquam erat volutpat. Vestibulum sagittis sed nibh sed congue. In luctus mauris ut massa consequat mollis.
            Ut ornare tortor quis nisi semper consequat id eu lectus. Maecenas vitae suscipit neque. Aenean sed mauris consequat,
            pharetra augue in, lacinia tellus. Maecenas congue orci nibh, at iaculis risus gravida vitae.
            Cras pulvinar quam eget turpis venenatis maximus. Sed nec lacinia arcu, a commodo nisl.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque euismod dapibus nulla,
            a ultricies orci accumsan et. Mauris vitae est nec ipsum gravida suscipit. Nulla efficitur consequat odio at iaculis.
            Sed non ultricies tortor. Mauris leo odio, accumsan non interdum eu, tempus hendrerit turpis.
        </p>
        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        <a class="btn btn-success" href="/contact">Contact</a>

    </div>
@endsection