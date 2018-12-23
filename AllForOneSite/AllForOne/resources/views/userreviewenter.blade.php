
@extends('layouts.app')
@section('pageAssets')

@endsection
@section('content')

    <script>
        function updateSlider(slideAmount) {
            var sliderDiv = document.getElementById("star");
            if (slideAmount == 1)
            {
                sliderDiv.innerHTML =  '<i class="fas fa-star"></i>';
            }
            else if (slideAmount == 2)
            {
                sliderDiv.innerHTML =  '<i class="fas fa-star"></i><i class="fas fa-star"></i>';
            }
            else if (slideAmount == 3)
            {
                sliderDiv.innerHTML =  '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">';
            }
            else if (slideAmount == 4)
            {
                sliderDiv.innerHTML =  '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"><i class="fas fa-star">';
            }
            else if (slideAmount == 5)
            {
                sliderDiv.innerHTML =  '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"><i class="fas fa-star"><i class="fas fa-star">';
            }else {
                sliderDiv.innerHTML = slideAmount;
            }
        }
    </script>
    <div class="container mt-5">
        <form action="/myRating/adduserreview" method="post">
            {{ csrf_field() }}
            <h3>Feedback User {{$user->name}}  For Event {{$event->naam}}</h3>
            <div class="form-group">
                <label for="starrating">Example Range input</label>
                <input type="range" min="1" max="5" value="1" class="form-control-range col-md-2" id="starrating" name="starrating" onchange="updateSlider(this.value)">
                <p class="help-block" id="star" style="color: #f0ad05"><i class="fas fa-star"></i></p>
            </div>
            <div class="form-group">
                <label for="inputEventTitel">Titel</label>
                    <input type="text" class="form-control" id="inputEventTitel" name="EventTitel" placeholder="Titel" required>

            </div>
            <div class="form-group ">
                <label class="control-label" for="inputEventText">Your message</label>
                <textarea class="form-control" id="inputEventText" name="EventText" placeholder="Please enter your message here..." rows="5"  required></textarea>
            </div>
            <input name="eventid" type="hidden" value="{{$event->id}}">
            <input name="Useridres" type="hidden" value="{{$user->id}}">
            <div class="form-group ">
                <div class="col-md-11 text-right">
                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection