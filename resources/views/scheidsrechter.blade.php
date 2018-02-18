@extends('layouts.default')

@section('scripts')
    <script src="{{ asset('js/wedstrijd.js') }}"></script>
@endsection

@section('content')
    <div class="wedstrijd">
        <h1 class="display-4">Beginnerswedstrijd 2018</h1>
        <div class="row">
            <div class="col-md-5">
                <h2>{{ $volgendeBeurt->lifter->naam }}</h2>
                <p>{{ $volgendeBeurt->beurtnummer }}e beurt</p>
                <p>{{ $volgendeBeurt->gewicht }}kg {{ $volgendeBeurt->lift }}</p>
            </div>
            <div class="col-md-5 offset-md-2">
                <h3>Upcoming</h3>
                @foreach($volgendeBeurten as $volgendeBeurt)
                    <p>{{ $volgendeBeurt->lifter->naam }} - {{ $volgendeBeurt->gewicht }}kg {{$volgendeBeurt->beurtnummer}}e {{ $volgendeBeurt->lift }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection