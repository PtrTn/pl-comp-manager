@extends('layouts.default')

@section('content')
    <div class="laders">
        <div class="row mt-5">
            <div class="col-md-12">
                @if($volgendeBeurt)
                    <h1 class="display-1">{{ $volgendeBeurt->gewicht }}kg {{ $volgendeBeurt->lift }}</h1>
                    <h1 class="display-4">{{ $volgendeBeurt->lifter->naam }}</h1>
                    <h1 class="display-4">{{ $volgendeBeurt->beurtnummer }}e beurt</h1>
                @else
                    <p>Er zijn geen volgende lifters</p>
                @endif
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
        <div class="row mt-5">
            <div class="col-md-5">
                <h3>Vorige beurten</h3>
                @forelse($vorigeBeurten as $vorigeBeurt)
                    <p class="@if($vorigeBeurt->gehaald)text-success @else text-danger @endif">{{ $vorigeBeurt->lifter->naam }} {{ $vorigeBeurt->gewicht }}kg {{$vorigeBeurt->beurtnummer}}e {{ $vorigeBeurt->lift }}</p>
                @empty
                    <p>Er zijn nog geen vorige beurten</p>
                @endforelse
            </div>
            <div class="col-md-5 offset-md-2">
                <h3>Volgende beurten</h3>
                @forelse($volgendeBeurten as $volgendeBeurt)
                    <p>{{ $loop->iteration }}. {{ $volgendeBeurt->lifter->naam }} {{ $volgendeBeurt->gewicht }}kg {{$volgendeBeurt->beurtnummer}}e {{ $volgendeBeurt->lift }}</p>
                @empty
                    <p>Er zijn hierna geen lifters meer aan de beurt</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection