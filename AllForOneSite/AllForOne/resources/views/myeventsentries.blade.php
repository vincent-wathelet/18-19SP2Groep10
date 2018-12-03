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

                        @foreach($entries as $entry)
                            <tr>
                                <td>{{$entry->event->naam}}</td>
                                <td>{{substr($entry->event->date, 0 , -9)}}</td>
                                <td>
                                    <span>{{$entry->event->lokaal->lokaal}}</span>
                                </td>
                                <td>
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="inputCheckboxes"
                                               @if($entry->bevestigt == true)
                                               checked
                                                @endif
                                                disabled
                                        />
                                        <label></label>
                                        <div class="hide entryid">{{$entry->id}}</div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{asset('myentries/delete/'.$entry->id)}}"
                                       class="btn btn-sm btn-icon btn-pure btn-default"
                                       data-toggle="tooltip"
                                       data-original-title="Leave">
                                        <i class="icon glyphicon glyphicon-remove-circle" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{asset('myevents/show/'.$entry->event->id)}}"
                                       class="btn btn-sm btn-icon btn-pure btn-default"
                                       data-toggle="tooltip"
                                       data-original-title="Detail">
                                        <i class="icon glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel-heading padding-top-15">
                <div class="row">
                    <div class="col col-sm-10">
                        <h2 class="panel-title">My Archived Entry's</h2>
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
                            <td class="text-center">Review</td>
                            <td class="text-center">Detail</td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($entries as $entry)
                            @if($entry->bevestigt == true)
                                <tr>
                                    <td>{{$entry->event->naam}}</td>
                                    <td>{{substr($entry->event->date, 0, -9)}}</td>
                                    <td>
                                        <span>{{$entry->event->lokaal->lokaal}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{asset('myentries/review/'.$entry->id)}}"
                                           class="btn btn-sm btn-icon btn-pure btn-default"
                                           data-toggle="tooltip"
                                           data-original-title="Review">

                                            @if($entry->event->feedbackevents->count() > 0)
                                                <i class="icon glyphicon glyphicon-ok" aria-hidden="true"></i>
                                            @else
                                                <i class="icon glyphicon glyphicon-plus" aria-hidden="true"></i>
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{asset('myevents/show/'.$entry->event->id)}}"
                                           class="btn btn-sm btn-icon btn-pure btn-default"
                                           data-toggle="tooltip"
                                           data-original-title="Detail">
                                            <i class="icon glyphicon glyphicon-circle-arrow-right"
                                               aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
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