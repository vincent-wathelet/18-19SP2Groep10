@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('global/vendor/icheck/icheck.css')}}">
    <link rel="stylesheet" href="{{ asset('global/vendor/dateimepicker/jquery.datetimepicker.min.css')}}">
@endsection

@section('content');
<!--
* eventdetails.blade.php
* Author: Abdelali Ez Zyn
* Last update: 20/12/2018
-->
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
                            method="post" id="main_form" enctype ='multipart/form-data'>
                        <div class="col col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Category: </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="categorieId">
                                            <option value="">Select Category</option>
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
                                    <label class="col-sm-3 control-label">Startdate: </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="@if (isset($event)) {{date("m/d/Y H:i", strtotime($event->date))}}@endif" name="begindate" id="begindate" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Enddate: </label>
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
                                    <label class="col-sm-3 control-label">Autoaccept: </label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="icheckbox-primary form-control" name="autoaccept"
                                               data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue"
                                               @if (isset($event) && $event->autoaccept == true) checked @endif  />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Max Subscriptions: </label>
                                    <div class="col-sm-8">
                                        <input type="number"  value="@if (isset($event)){{(int)$event->maxInschrijvingen}}@endif" class="form-control" name="maxInschrijvingen" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Computers Needed: </label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="icheckbox-primary form-control" name="computer_needed"
                                               data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue"
                                                />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Classroom: </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="lokaalId" required>
                                            <option value="">No Classroom</option>
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
                                    <label class="col-sm-3 control-label">Upload image: </label>
                                    <div class="col-sm-9" style="padding-top: 7%; " >
                                        <input  type="file" value="" id="eventimage" name="eventimage" requird/>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9" style="padding-top: 2%; margin-bottom: 2%;" >
                                            <div id="image_preview" style="width:100%;">

                                                    @if (isset($event))
                                                        <img src="{{ URL::asset('uploadPic/'.$event->eventimage) }}">
                                                    @else
                                                        <p>No image found!</p>
                                                    @endif

                                            </div>
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
                         
                    
        });

        $('#eventimage').change(function(){

            $('#image_preview').html("");
            var total_file = document.getElementById('eventimage').files.length;
            for(var i = 0; i < total_file; i++){
                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
        });

         $('form').ajaxForm(function() 

        {

            alert("Succesfully uploaded.");

        }); 

    </script>
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