@extends('layout')
@section('content');
<div class="page-main container">
    {{--<div class="page-header">--}}
    {{--<h1 class="page-title">Two Columns</h1>--}}
    {{--</div>--}}
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading padding-top-15">
                <div class="row">
                    <div class="col col-sm-10">
                        <h2 class="panel-title">My Entry's</h2>
                    </div>
                </div>
            </div>

            <div class="panel-body">

                <hr>
                <div class="table-responsive">
                    <table class="table table-striped font-size-16">
                        <thead>
                        <tr>
                            <td>naam</td>
                            <td>datum</td>
                            <td>locatie</td>
                            <td class="text-center">Accepted</td>
                            <td class="text-center">Leave</td>
                            <td class="text-center">Detail</td>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($evententries as $evententry)
                            <tr>
                                <td>{{ $evententry['naam'] }}</td>
                                <td>{{$evententry['begindate']}}</td>
                                <td>
                        {{-- <span>{{$evententry['lokaal']['lokaal']}}</span> --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

@section('js')
    <script>
        $('[name="inputCheckboxes"]').on('change', function () {
            id = $(this).parent().find('.entryid').html();
            // $.ajax({
            //     url: 'myevents',
            //
            // })

            window.location.href = "{{asset('myevents/accept')}}/" + id;
        })
    </script>
@endsection