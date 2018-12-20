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
                            Users accepted to the event {{ $event->naam }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="panel-body">

                <hr>
                <div class="table-responsive">
                    <table class="table table-striped font-size-16">
                        <thead>
                        <tr>
                            name
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($inschrijvings as $inschrijving)
                            <tr>
                                <td class="bg-indigo-50">
                                    <strong>
                                        {{ $inschrijving->user->name }}
                                    </strong>
                                </td>
                                <td class="bg-indigo-50">

                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="fault"
                                               data-toggle="tooltip"
                                               data-original-title="check if user didn't attend"
                                        />
                                        <label></label>
                                        <div class="hide userid">{{$inschrijving->user->id}}</div>
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
        $('[name="fault"]').on('change', function () {
            id = $(this).parent().find('.userid').html();

            window.location.href = "{{asset('myevents/fault')}}/" + id;
        })
    </script>
@endsection
