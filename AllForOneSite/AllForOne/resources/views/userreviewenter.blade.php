
@extends('layouts.app')
@section('pageAssets')

@endsection
@section('content')
    <div class="container mt-5">
        <form action="/myRating/adduserreview" method="post">
            {{ csrf_field() }}
            <h3>Feedback User {{$user->name}}  For Event {{$event->naam}}</h3>
            <div class="form-group">
                <label for="starrating">StarRating</label>
                <input type="range" min="1" max="5" class="slick-slider" name="starrating" id="starrating">
            </div>
            <div class="form-group">
                <label for="inputEventTitel">Titel</label>
                    <input type="text" class="form-control" id="inputEventTitel" name="EventTitel" placeholder="Titel" required>

            </div>
            <div class="form-group ">
                <label class="control-label" for="inputEventText">Your message</label>
                <textarea class="form-control" id="inputEventText" name="EventText" placeholder="Please enter your message here..." rows="5"  required></textarea>
            </div>
            <input name="categorieid" type="hidden" value="{{$event->Categorie()->first()->id}}">
            <input name="Useridres" type="hidden" value="{{$user->id}}">
            <div class="form-group ">
                <div class="col-md-11 text-right">
                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection