@extends('layouts.default')

@section('scripts')
    <script src="{{ asset('js/wedstrijd.js') }}"></script>
@endsection

@section('content')
    <div class="wedstrijd">
        <h1 class="display-4">Beginnerswedstrijd 2018</h1>
        <div class="row">
            <div class="col-md-5">
                @if($volgendeBeurt)
                    <h2>{{ $volgendeBeurt->lifter->naam }}</h2>
                    <p>{{ $volgendeBeurt->beurtnummer }}e beurt</p>
                    <p>{{ $volgendeBeurt->gewicht }}kg {{ $volgendeBeurt->lift }}</p>
                    {!! form($form) !!}
                @else
                    <p>Er zijn geen volgende lifters</p>
                @endif
            </div>
            <div class="col-md-5 offset-md-2">
                <h3>Vorige beurten</h3>
                @forelse($vorigeBeurten as $vorigeBeurt)
                    <p class="@if($vorigeBeurt->gehaald)text-success @else text-danger @endif">{{ $vorigeBeurt->lifter->naam }} {{ $vorigeBeurt->gewicht }}kg {{$vorigeBeurt->beurtnummer}}e {{ $vorigeBeurt->lift }}</p>
                @empty
                    <p>Er zijn nog geen vorige beurten</p>
                @endforelse
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