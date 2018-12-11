@extends('layouts.app')
@section('pageAssets')

@endsection
@section('content')
<div class="container">
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
                            <tr>
                                <td>{{$event->naam}}</td>
                                <td>{{$event->date}}</td>
                                <td>{{$event->lokaal->gebouw}} {{$event->lokaal->lokaal}}</td>
                                <td><a class="btn btn-success" href="">Inschrijven</a></td>
                                <td><a class="btn btn-primary" href="allevents/{{$event->id}}"><i class="fas fa-arrow-circle-right"></i></a></td>
                            </tr>
                    @endforeach
                    </table>
                @endif
            @endforeach
        @endif
    </div>
</div>

@endsection
