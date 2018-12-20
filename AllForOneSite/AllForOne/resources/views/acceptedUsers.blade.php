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
                        <h2 class="panel-title">
                            users accepted to the event {{ $event->naam }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="panel-body">

                <hr>
                <div class="table-responsive">
                    @if(!$endEvent)
                        <table class="table table-striped font-size-16">
                            <thead>
                            <tr>
                                <th>
                                    name
                                </th>
                                <th>
                                    opciones
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($inschrijvings as $inschrijving)
                                <tr>
                                    <td class="bg-indigo-50">
                                        <strong>
                                            {{ $inschrijving->user->name }}
                                            @if($inschrijving->user->banned)
                                                (The current user has been banned)
                                            @endif
                                        </strong>
                                    </td>
                                    <td class="bg-indigo-50">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="attended"
                                                   data-toggle="tooltip"
                                                   data-original-title="check if this user is attended the event"
                                            />
                                            <label>Attended</label>
                                            <div class="hide userid">{{ $inschrijving->user->id }}</div>
                                            <div class="hide eventid">{{ $event->id }}</div>
                                        </div>
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="fault"
                                                   data-toggle="tooltip"
                                                   data-original-title="check if this user is missing"

                                            />
                                            <label>Missed</label>
                                            <div class="hide userid">{{ $inschrijving->user->id }}</div>
                                            <div class="hide eventid">{{ $event->id }}</div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1>The event {{ $event->naam }} has finished</h1>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('global/vendor/icheck/icheck.min.js')}}"></script>
    <script src="{{ asset('global/js/components/icheck.js')}}"></script>
    <script>
        $('[name="fault"]').on('change', function () {
            id = $(this).parent().find('.userid').html();
            event_id = $(this).parent().find('.eventid').html();
            // $.ajax({
            //     url: 'myevents',
            //
            // })

            window.location.href = "{{asset('myevents/fault')}}/" + id + "/" + event_id;
        })
        $('[name="attended"]').on('change', function () {
            id = $(this).parent().find('.userid').html();
            event_id = $(this).parent().find('.eventid').html();
            // $.ajax({
            //     url: 'myevents',
            //
            // })

            window.location.href = "{{asset('myevents/attended')}}/" + id + "/" + event_id;
        })
    </script>
@endsection
