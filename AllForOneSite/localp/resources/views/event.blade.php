@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row border">
            <div class="col-md-8 ">
                <h3>{{$event->naam}}</h3>
                <br>
                <p>lokaal : {{$event->lokaal->gebouw}}{{$event->lokaal->lokaal}}</p>
                <p>begin datum : {{date('d-M-Y H:i', strtotime($event->begindate))}}</p>
                <p>eind datum : {{date('d-M-Y H:i', strtotime($event->enddate))}}</p>
                <br>
                <p><span class="text-uppercase font-weight-bold"> omschrijving</span> <br>{{$event->description}}</p>

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
                    @if(!$event->organisatorens()->where('userid', Auth::user()['id'])->first())
                    @if($event->inschrijvings()->where('userid', Auth::user()['id'])->first())
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