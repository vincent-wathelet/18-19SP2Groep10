@extends('layouts.app')
@section('pageAssets')

@endsection
@section('content')
<div class="container">
    <div class="row mt-5">
	<div class="col-lg-3">
        <h3>Filter</h3>
        <div class="optionsDiv">
            Categorie
            <select id="selectField">
                <option value="All" selected>All</option>
                <option value="Keynote">Keynote</option>
                <option value="Workshop">Workshop</option>
                <option value="Andere">Andere</option>
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

@endsection
