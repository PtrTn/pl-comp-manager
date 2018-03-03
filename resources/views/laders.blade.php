@extends('layouts.default')

@section('title', 'Laders')

@section('content')
    <div class="laders">
        <div class="row">
            <div class="col-md-12">
                <p>In dit scherm kunnen de laders zien welke gewichten er op geladen moeten worden en welke rekhoogte ingesteld dient te worden.</p>
            </div>
            <div class="col-md-8">
                @if($huidigeBeurt)
                    <h1 class="display-1">{{ $huidigeBeurt->gewicht }}kg {{ $huidigeBeurt->lift }}</h1>
                    @if($huidigeBeurt->lift === 'squat')
                        <h1 class="display-4">Rekhoogte {{ $huidigeBeurt->lifter->rekHoogteSquat }}</h1>
                    @elseif($huidigeBeurt->lift === 'bench')
                        <h1 class="display-4">Rekhoogte {{ $huidigeBeurt->lifter->rekHoogteBench }}</h1>
                    @endif
                @else
                    <p>Er zijn geen volgende lifters</p>
                @endif
            </div>
            <div class="col-md-3 offset-md-1 mt-3">
                <h1>{{ $huidigeBeurt->lifter->naam }}</h1>
                <h1>{{ $huidigeBeurt->beurtnummer }}e beurt</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="bar-container">
                    @if($plates)
                        <div class="clip"></div>
                        @foreach($plates->reverse() as $plate)
                            <div class="plate-{{ $plate->weight }}">{{ $plate->weight }}</div>
                        @endforeach
                        <div class="bar"></div>
                        @foreach($plates as $plate)
                            <div class="plate-{{ $plate->weight }}">{{ $plate->weight }}</div>
                        @endforeach
                        <div class="clip"></div>
                    @endif
                </div>
            </div>
        </div>
        <hr class="mt-5">
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Volgende beurt</h3>
            </div>
            <div class="col-md-8">
                @if($volgendeBeurt)
                    <h1 class="display-4">{{ $volgendeBeurt->gewicht }}kg {{ $volgendeBeurt->lift }}</h1>
                    @if($volgendeBeurt->lift === 'squat')
                        <h2>Rekhoogte {{ $volgendeBeurt->lifter->rekHoogteSquat }}</h2>
                    @elseif($volgendeBeurt->lift === 'bench')
                        <h2>Rekhoogte {{ $volgendeBeurt->lifter->rekHoogteBench }}</h2>
                    @endif
                @endif()
            </div>
            <div class="col-md-3 offset-md-1">
                <h4>{{ $volgendeBeurt->lifter->naam }}</h4>
                <h4>{{ $volgendeBeurt->beurtnummer }}e beurt</h4>
            </div>
        </div>
    </div>
@endsection