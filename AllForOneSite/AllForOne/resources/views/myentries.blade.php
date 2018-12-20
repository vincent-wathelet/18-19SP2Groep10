@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('global/vendor/icheck/icheck.css')}}">
    <link rel="stylesheet" href="{{ asset('global/fonts/font-awesome/font-awesome.css')}}">
@endsection
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
                        <h2 class="panel-title">{{\App\Event::find($id)->naam}}</h2>
                    </div>
                    <div class="col col-sm-2 padding-10">

                    </div>
                </div>
            </div>

            <div class="panel-body">
                <hr>
                <div class="table-responsive">
                    <div class="col-sm-6"><span class="pull-left">Number of subscribers: {{count($entries)}}</span></div>
                    <div class="col-sm-6"><span class="pull-right">Still possible subbs: -</span></div>
                    <br>
                    <br>
                    <table class="table table-striped font-size-16">
                        <thead>
                        <tr>
                            {{-- <td>id</td> --}}
                            <td>Name</td>
                            <td class="text-center">Account Status</td>
                            <td class="text-center">Accepted</td>
                            <td class="text-center">Not Accepted</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entries as $entry)
                            <tr>
                                {{-- <td>{{$entry->userid}}</td> --}}

                                <td>{{$entry->user->name}}</td>
                                <td class="text-center">
                                    <i
                                            @if($entry->user->banned == true)
                                            class="icon fa-check-square"
                                            @else
                                            class="icon fa-exclamation-triangle"
                                            @endif
                                            aria-hidden="true"></i>
                                </td>
                                <td>
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="inputCheckboxes"
                                               @if($entry->bevestigt == true)
                                               checked
                                               @endif
                                        />
                                        <label></label>
                                        <div class="hide entryid">{{$entry->id}}</div>

                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="inputCheckboxes"
                                               @if($entry->bevestigt == false)
                                               checked
                                               @endif

                                        />
                                        <label></label>
                                        <div class="hide entryid">{{$entry->id}}</div>

                                    </div>
                                </td>
                            </tr>
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
    <script src="{{ asset('global/vendor/icheck/icheck.min.js')}}"></script>
    <script src="{{ asset('global/js/components/icheck.js')}}"></script>
    <script>
        $('[name="inputCheckboxes"]').on('change', function () {
            id = $(this).parent().find('.entryid').html();

            window.location.href = "{{asset('myevents/accept')}}/" + id;
        })
    </script>
@endsection