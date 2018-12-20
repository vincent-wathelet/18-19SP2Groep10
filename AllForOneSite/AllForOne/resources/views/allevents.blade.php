@extends('layout')

@section('content')
<!--
* allevents.blade.php
* Author: Abdelali Ez Zyn
* Last update: 20/12/2018
-->
<div class="container">
    <div class="row mt-5">
	<div class="col-lg-3">
        {{ csrf_field() }}
        <div class="optionsDiv">
            <h4>Categorie</h4>
            <select  id="selectcategory" name="selectcategory[]" class="js-select2" multiple="multiple">
            
                @foreach($categories as $category)
                        <option value="{{ $category['id'] }}"  
                                <?php 
                             /*    if(in_array($category['id'], $categoriesArray)){ echo 'selected="selected"';} */
                                ?> 
                        data-badge="" >
                        {{$category['naam']}}
                    </option>
                @endforeach    
                
            </select>
        </div>   
	</div>
    <div class="col-lg-9">
        @if($categories == null)
            <h1>No data Found</h1>
        @else
            @foreach($categories as $categorie)
                <h1>{{$categorie->naam}}</h1>
                @if($categorie->events->count() == 0)
                <p>No events Found</p>
                @else
                    <table class="table">
                        <tr>
                            <th>Naam</th>
                            <th>Datum</th>
                            <th>Lokaal</th>
                            <th>inschrijving</th>
                            <th>Detail</th>
                        </tr>
                @foreach($categorie->events as $event)
                            @if($event->organisatorens()->where('userid', Auth::user()->id)->first())
                                <tr>
                                    <td>{{$event->naam}}</td>
                                    <td>{{date('d-M-Y H:i', strtotime($event->begindate))}}</td>
                                    <td>{{$event->lokaal->gebouw}}{{$event->lokaal->lokaal}}</td>
                                    <td></td>
                                    <td><a class="btn btn-warning" href="allevents/{{$event->id}}"><i class="far fa-edit"></i></a></td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{$event->naam}}</td>
                                    <td>{{date('d-M-Y H:i', strtotime($event->begindate))}}</td>
                                    <td>{{$event->lokaal->gebouw}}{{$event->lokaal->lokaal}}</td>
                                    <td>
                                        @if(strtotime($event->begindate) >= time())
                                        @if($event->inschrijvings()->where('userid', Auth::user()->id)->first())

                                            @if($event->inschrijvings()->where('userid', Auth::user()->id)->where('active', true)->first())
                                                <a class="btn btn-danger text-white mt-2 mb-2" href="/allevents/{{$event->id}}/uitschrijven">Uitschrijven</a>
                                            @else
                                                <a class="btn btn-success text-white mt-2 mb-2" href="/allevents/{{$event->id}}/inschrijving">Inschrijven</a>
                                            @endif
                                        @else
                                            <a class="btn btn-success text-white mt-2 mb-2" href="/allevents/{{$event->id}}/inschrijving">Inschrijven</a>
                                        @endif
                                            @elseif($event->inschrijvings()->where('userid', Auth::user()->id)->first())
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary" href="allevents/{{$event->id}}"><i class="fas fa-arrow-circle-right"></i></a></td>
                                </tr>
                            @endif


                    @endforeach
                    </table>
                @endif
            @endforeach
        @endif
    </div>
</div>
</div>

    <div class="col-lg-9" id="allEventsList">
        @include('shared.alleventslist')      
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">

   /* Ajax */

   $(document).ready(function(){
        
        $("select").change(function(){
            
            var selectcategory = $("#selectcategory").val();
            var token = $('input[name="_token"]').val();

            $.ajax({
                
                type: "post",
                data: "selectcategory=" + selectcategory + "&_token=" + token,
                url: "/allevents",
                success: function(dataHtml){
                    $('#allEventsList').html(dataHtml);
                }

            });
        });

    });

    /* subscribe */
    /* onclick */

    function subscribeFunction(eventId){

        var token = $('input[name="_token"]').val();

        $.ajax({
            
            type: "POST",
            url: "{{route('allevents-subscribe')}}",
            data: "eventId=" + eventId + "&_token=" + token,
            success: function(action){
                if(action == 'delete'){
                    $('#subscribebutton-'+eventId).html('<i class="fa fa-plus" aria-hidden="true"></i>');
                }else if(action == 'insert'){
                    $('#subscribebutton-'+eventId).html('<i class="fa fa-check" aria-hidden="true"></i>');
                }
            }

        }); 

    }
        
    $(document).ready(function(){   
            $('#insert').click(function(){
                    $(this).html('<i class="fa fa-check" aria-hidden="true"></i> SUBSCRIBE');
            });
            $('#delete').click(function(){
                    $(this).html('<i class="fa fa-plus" aria-hidden="true"></i> SUBSCRIBE');
            });

     }); 
    
    $eventSelect = $(".js-select2");

    $(".js-select2").select2({
        closeOnSelect : false,
        placeholder : "All",
        allowHtml: true,
        allowClear: true,
        tags: true
    });
    $eventSelect.on("select2:open", function (e) { console.log("select2:open", e); });
    $eventSelect.on("select2:close", function (e) { console.log("select2:close", e); });
    $eventSelect.on("select2:select", function (e) { console.log("select2:select", e); });
    $eventSelect.on("select2:unselect", function (e) { console.log("select2:unselect", e); });

    function iformat(icon, badge,) {
        var originalOption = icon.element;
        var originalOptionBadge = $(originalOption).data('badge');
        
        return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
    }

    </script>
    
@endsection