@extends('layout')

@section('content')
<div class="container">
	<div class="col-lg-3">
        {{ csrf_field() }}
        <div class="optionsDiv">
            <h4>Categorie-Filter</h4>
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
    <div class="col-lg-9" id="allEventsList">
        @include('shared.alleventslist')      
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">

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


