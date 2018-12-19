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
                                @if(!in_array($categoriesEvent->id,$userEvents))
                        <button class="btn btn-primary" id="subscribebutton-{{ $categoriesEvent->id }}" onclick="subscribeFunction('{{$categoriesEvent->id}}')" >                                    
                                            <i class="fa fa-plus" aria-hidden="true"></i> SUBSCRIBE
                                    </button>
                                @else
                                    <button class="btn btn-primary"  id="subscribebutton-{{ $categoriesEvent->id }}" onclick="subscribeFunction('{{$categoriesEvent->id}}')" >                                    
                                            <i class="fa fa-check" aria-hidden="true"></i> SUBSCRIBE                                   
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


