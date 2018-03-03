@extends('layouts.default')

@section('title', 'Scheidsrechter')

@section('content')
    <div class="scheidsrechter">
        <div class="row">
            <div class="col-md-12">
                <p>De wedstrijdleiding kan dit scherm gebruiken om aan te geven hoe de scheidsrechter(s) hebben geoordeeld over de huidige beurt.</p>
            </div>
            <div class="col-md-5">
                @if($volgendeBeurt)
                    <h1>{{ $volgendeBeurt->lifter->naam }}</h1>
                    <h2>{{ $volgendeBeurt->gewicht }}kg {{ $volgendeBeurt->lift }}</h2>
                    <h2>{{ $volgendeBeurt->beurtnummer }}e beurt</h2>
                    <div class="mt-5">
                        {!! form($form) !!}
                    </div>
                @else
                    <h3>Er zijn geen volgende lifters</h3>
                @endif
            </div>
            <div class="col-md-5 offset-md-2 beurten">
                <h3>Beurtenoverzicht</h3>
                <ul class="list-group">
                @foreach($volgendeBeurten as $volgendeBeurt)
                    <li class="list-group-item @if($loop->last)list-group-item-primary @endif">
                        {{ $volgendeBeurt->lifter->naam }} {{ $volgendeBeurt->gewicht }}kg {{$volgendeBeurt->beurtnummer}}e {{ $volgendeBeurt->lift }}
                    </li>
                @endforeach
                @foreach($vorigeBeurten as $vorigeBeurt)
                    <li class="list-group-item @if($vorigeBeurt->gehaald)list-group-item-success @else list-group-item-danger @endif">{{ $vorigeBeurt->lifter->naam }} {{ $vorigeBeurt->gewicht }}kg {{$vorigeBeurt->beurtnummer}}e {{ $vorigeBeurt->lift }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection