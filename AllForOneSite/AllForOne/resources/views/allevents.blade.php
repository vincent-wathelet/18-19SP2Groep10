@extends('layout')

@section('content')
<div class="container">
	<div class="col-lg-3">
    <form action="{{route('allevents')}}" method="POST" id="AllEventsForm">  
            {{csrf_field()}}
        <div class="optionsDiv">
            <h4>Categorie-Filter</h4>
            <select id="selectField" name="selectcategory[]" class="js-select2" multiple="multiple">
            
                <option value="0" 
                <?php 
                    /* if(in_array(0, $categoriesArray)){ echo 'selected="selected"';} */
                ?> data-badge="" >All</option>

                @foreach($categories as $category)
                        <option value="{{ $category['id'] }}"  
                                <?php 
                                if(in_array($category['id'], $categoriesArray)){ echo 'selected="selected"';}
                                ?> 
                        data-badge="" >
                        {{$category['naam']}}
                    </option>
                @endforeach    

            </select>
        </div>
    </form>
	</div>
    <div class="col-lg-9">

        
        @foreach($categories as $categorie)
            <?php
            if(!array_key_exists($categorie->id,$categoriesEvents))
                    continue;
            ?>         
            <h4>{{$categorie->naam}}</h4>
            @if($categoriesEvents[$categorie->id]->isEmpty())
            <p>No events Found</p>
            @else            
            <div class="row borders">
                @foreach( $categoriesEvents[$categorie->id] as $categoriesEvent)
                
                    <div class="col-md-4">
                        <div class="card">
                            <div class="images">
                            <img src="{{ asset('assets/images/events.jpg')}}" class="img" alt="Avatar" style="width:100%">
                            </div>
                            <div class="cardcontainer">
                               <div class="row"> 
                                    <div class="col-md-2">
                                        <h5 class="colors htag"> DEC </h5>
                                        <h3 class="htag"> 15 </h3>
                                    </div>
                                    <div class="col-md-10">
                                            <h4 class="htag capitalize"> {{$categoriesEvent->naam}} </h4>
                                            <p> {{$categoriesEvent->date}}</p>
                                            <h4 class="htag capitalize"> {{$categoriesEvent->lokaal->gebouw}} {{$categoriesEvent->lokaal->lokaal}} </h4>
                                            <p class="ptag">Thu, Dec 15, 8.45am </p> 
                                            <p class="ptag"> {{$categoriesEvent->description}}</p>
                                            <a class="btn btn-primary" style="margin-top:2px;" href="allevents/{{$categoriesEvent->id}}">
                                                <i class="fa fa-plus" aria-hidden="true"></i> SUBSCRIBE
                                            </a>
                                    </div>
                                    <div>
                                            
                                    </div>    
                               </div>
                            </div>
                        </div>
                    </div>
                  
                @endforeach
            </div>    
            @endif                        
        @endforeach
      
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    function submitForm(){
       document.getElementById('AllEventsForm').submit();
    }
  
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
$eventSelect.on("select2:select", function (e) { console.log("select2:select", e);  submitForm()});
$eventSelect.on("select2:unselect", function (e) { console.log("select2:unselect", e); submitForm()});



        function iformat(icon, badge,) {
            var originalOption = icon.element;
            var originalOptionBadge = $(originalOption).data('badge');
            
            return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
        }
    </script>
    
@endsection


