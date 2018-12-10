@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('global/vendor/icheck/icheck.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/dateimepicker/jquery.datetimepicker.min.css')}}">
@endsection

@section('content');
<div class="page-main container">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading padding-top-15">
                <div class="row">
                    <div class="col col-sm-10">
                        <h2 class="panel-title">My Events</h2>
                    </div>

                </div>
            </div>

            <div class="panel-body">
                <hr>
                <div class="row">
                    <form
                            @if(isset($event))
                            action="{{asset('myevents/save/'.$event->id)}}"
                            @else
                            action="{{asset('myevents/save')}}"
                            @endif
                            method="post" id="main_form">
                        <div class="col col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Categorie: </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="categorieId">
                                            <option value="">select category</option>
                                            @foreach($categories as $category)
                                                <option
                                                        @if (isset($event) && $event->categorieId == $category->id)
                                                            selected
                                                        @endif
                                                        value="{{$category->id}}">{{$category->naam}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title: </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="@if (isset($event)) {{$event->naam}}@endif" name="naam" placeholder="Give a title" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Start Datum: </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="@if (isset($event)) {{date("m/d/Y H:i", strtotime($event->date))}}@endif" name="begindate" id="begindate" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">End Datum: </label>
                                    <div class="col-sm-9">
                                        <input class="form-control"
                                               {{--value="@if (isset($event)) {{$event->addtime($event->date, $event->duur)}}@endif"--}}
                                               name="enddate" id="enddate" placeholder=""
                                                @if (!isset($event))
                                               required
                                               @endif
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Auto Accept: </label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="icheckbox-primary form-control" name="autoaccept"
                                               data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue"
                                               @if (isset($event) && $event->autoaccept == true) checked @endif  />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Max Number subscription: </label>
                                    <div class="col-sm-8">
                                        <input type="number"  value="@if (isset($event)){{(int)$event->maxInschrijvingen}}@endif" class="form-control" name="maxInschrijvingen" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Computer Needed: </label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="icheckbox-primary form-control" name="computer_needed"
                                               data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue"
                                                />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Lokaal: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="lokaalId" required>
                                            <option value="">No room</option>
                                            @foreach($lokaal as $item)
                                                <option
                                                        @if (isset($event) && $event->lokaalId == $item->id)
                                                        selected
                                                        @endif
                                                        value="{{$item->id}}">{{$item->lokaal}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        {{--<input class="form-control" placeholder="" required name="">--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control"  value="" name="description" placeholder="" rows="5" required>@if(isset($event)){{$event->description}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary pull-right" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('global/vendor/icheck/icheck.min.js')}}"></script>
    <script src="{{ asset('global/js/components/icheck.js')}}"></script>
    <script src="{{ asset('global/vendor/dateimepicker/jquery.datetimepicker.full.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#begindate').datetimepicker({
                format:'m/d/Y H:i',
                onChangeDateTime:logic
            });


            if ($('#begindate').val() != '') {
                $('#enddate').datetimepicker({
                    format:'m/d/Y H:i',
                    minDateTime: $('#begindate').datetimepicker('getValue'),
                })
            }

            function logic() {
                $('#enddate').val($('#begindate').val());
                $('#enddate').datetimepicker({
                    format:'m/d/Y H:i',
                    minDateTime: $('#begindate').datetimepicker('getValue'),
                    default:  $('#begindate').datetimepicker('getValue'),
                })
            }
            //
            //
            // $.getJSON('https://api.ipify.org?format=json', function(data){
            //     console.log(data.ip);
            // });
            //
            // $.getJSON('http://ipinfo.io', function(data){
            //     console.log(data);
            // });


        })
    </script>
@endsection