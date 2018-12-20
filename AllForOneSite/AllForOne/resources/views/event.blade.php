@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 ">
                <h3>{{$event->naam}}</h3>
                <br>
                <p>lokaal : {{$event->lokaal->gebouw}}{{$event->lokaal->lokaal}}</p>
                <p>begin datum : {{date('d-M-Y H:i', strtotime($event->begindate))}}</p>
                <p>eind datum : {{date('d-M-Y H:i', strtotime($event->enddate))}}</p>
                <br>
                <p><span class="text-uppercase font-weight-bold"> omschrijving</span> <br>{{$event->description}}</p>

                <!-- TODO if structuur die kijk of event al is gedaan en de gebruiker naar het event is geweest -->
                <form action="/myRating/addeventreview" method="post">
                    {{ csrf_field() }}
                    <h3>Feedback Event</h3>
                    <div class="form-group">
                        <label for="inputEventTitel">Titel</label>
                        @if($event->feedbackevents()->where('userId', Auth::user()->id)->count() != 0)
                            <input type="text" class="form-control" id="inputEventTitel" name="EventTitel" placeholder="Titel" value="{{$event->feedbackevents()->where('userId', Auth::user()->id)->first()->titel}}" required>
                        @else
                            <input type="text" class="form-control" id="inputEventTitel" name="EventTitel" placeholder="Titel" required>
                        @endif
                    </div>
                    <div class="form-group ">
                        <label class="control-label" for="inputEventText">Your message</label>
                        @if($event->feedbackevents()->where('userId', Auth::user()->id)->count() != 0)
                            <textarea class="form-control" id="inputEventText" name="EventText" placeholder="Please enter your message here..." rows="5"  required>{{$event->feedbackevents()->where('userId', Auth::user()->id)->first()->tekst}}</textarea>
                        @else
                            <textarea class="form-control" id="inputEventText" name="EventText" placeholder="Please enter your message here..." rows="5"  required></textarea>
                        @endif

                    </div>
                     <input name="eventid" type="hidden" value="{{$event->id}}">
                    <div class="form-group ">
                        <div class="col-md-11 text-right">
                            <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>
                    </div>
                </form>
                <h3>Feedback Organisators</h3>
                <table class="table">
                    <tr>
                        <th scope="col">naam</th>
                        <th scope="col">titel</th>
                        <th scope="col">review</th>
                    </tr>
                @foreach($event->organisatorens()->get() as $organisator)
                        <tr>
                            <td>{{$organisator->user()->get()->first()->name}}</td>
                            <td>{{$organisator->titel}}</td>
                            <td><a href="/myRating/adduserreview/{{$organisator->user()->get()->first()->id}}/{{$event->id}}" class="btn btn-warning"><i class="fas fa-star"></i></a></td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div class="col-md-4 ">
                <div class="">
                    <h2>Inschrijvingen</h2>
                    <br>
                    <p>aantal inscrhijvingen {{$event->inschrijvings()->get()->count()}}
                        /{{$event->maxInschrijvingen}}</p>
                    <table>
                        <tr>
                            <th>naam</th>
                            <th>Bevestigd</th>
                        </tr>
                        @foreach($event->inschrijvings()->get() as $inschrijving)
                            @if($inschrijving->active == true)
                            <tr>
                                <td>{{$inschrijving->user()->get()->first()->name}}</td>
                                <td class="text-center">
                                    @if($inschrijving->bevestigt == true)
                                        <i class="far fa-check-circle text-success"></i>
                                    @else
                                        <i class="far fa-times-circle text-danger"></i>
                                    @endif


                                </td>
                            </tr>
                            @endif

                        @endforeach



                    </table>
                    @if(!$event->organisatorens()->where('userid', Auth::user()->id)->first() && strtotime($event->begindate) >= time())

                    @if($event->inschrijvings()->where('userid', Auth::user()->id)->first())
                        @if($event->inschrijvings()->where('userid', Auth::user()->id)->where('active', true)->first())
                        <a class="btn btn-danger text-white mt-2 mb-2" href="/allevents/{{$event->id}}/uitschrijven">Uitschrijven</a>
                        @else
                        <a class="btn btn-success text-white mt-2 mb-2" href="/allevents/{{$event->id}}/inschrijving">Inschrijven</a>
                        @endif
                    @else
                        <a class="btn btn-success text-white mt-2 mb-2" href="/allevents/{{$event->id}}/inschrijving">Inschrijven</a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection