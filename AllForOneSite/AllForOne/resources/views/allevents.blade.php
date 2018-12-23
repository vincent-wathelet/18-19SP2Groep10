@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-lg-12 mt-5">
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

@endsection