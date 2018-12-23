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
                        <img src="{{ URL::asset('uploadPic/'.$categoriesEvent->eventimage) }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/avatar.ico')}}';" class="img" alt="Avatar" style="width:100%; height: 141px; ">
                </div>
                <div class="cardcontainer">
                   <div class="row"> 
                        <div class="col-md-3">
                            <h4 class="colors htag hfont"> {{date("M", strtotime($categoriesEvent->begindate))}} </h4>
                            <h4 class="htag"> {{date("d", strtotime($categoriesEvent->begindate))}} </h4>
                            
                        </div>
                        <div class="col-md-6" style="padding: 0;">
                                <h6 class="htag capitalize"> {{$categoriesEvent->naam}} </h6>
                                <p> {{$categoriesEvent->date}}</p>
                                <h5 class="htag capitalize"> {{$categoriesEvent->lokaal->gebouw}} {{$categoriesEvent->lokaal->lokaal}} </h5>
                                <p class="ptag"> {{date("D, M d H:i A", strtotime($categoriesEvent->begindate))}}</p> 
                               {{--  <p class="ptag"> {{$categoriesEvent->description}}</p> --}}
                        </div>
                        <div class="col-md-3" style="padding: 0;">
                            @if(!in_array($categoriesEvent->id,$userEvents))
                            <button class="btn btn-primary custombtn" id="subscribebutton-{{ $categoriesEvent->id }}" onclick="subscribeFunction('{{$categoriesEvent->id}}')" >                                    
                                        <i class="fa fa-plus" aria-hidden="true"></i> 
                                </button>
                            @else
                                <button class="btn btn-primary custombtn"  id="subscribebutton-{{ $categoriesEvent->id }}" onclick="subscribeFunction('{{$categoriesEvent->id}}')" >                                    
                                        <i class="fa fa-check" aria-hidden="true"></i>                                   
                                </button>
                            @endif    
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
