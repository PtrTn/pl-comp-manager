@extends('layouts.default')

@section('scripts')
    <script src="{{ asset('js/lifters.js') }}"></script>
@endsection

@section('content')
    <div class="row wedstrijd">
        <div class="col-md-12 col-xs-12">
            <h1 class="display-4">Beginnerswedstrijd 2018</h1>

            @if (count($lifters) == 0)
                <p>Er zijn geen lifters ingevoerd</p>
            @else
                <table class="table table-hover lifters">
                    <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Gewichtsklasse</th>
                        <th scope="col">Bodyweight</th>
                        <th scope="col">Rekhoogte Squat</th>
                        <th scope="col">Rekhoogte Bench</th>
                        <th scope="col">Squat 1</th>
                        <th scope="col">Bench 1</th>
                        <th scope="col">Deadlift 1</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lifters as $lifter)
                        <tr data-pk="{{ $lifter->id }}">
                            <td class="autoWidth"><a href="#" data-name="naam">{{ $lifter->naam }}</a></td>
                            <td><a href="#" data-name="gewichtsklasse">{{ $lifter->gewichtsklasse }}</a></td>
                            <td><a href="#" data-name="bodyweight">{{ $lifter->bodyweight }}</a></td>
                            <td><a href="#" data-name="rekHoogteSquat">{{ $lifter->rekHoogteSquat }}</a></td>
                            <td><a href="#" data-name="rekHoogteBench">{{ $lifter->rekHoogteBench }}</a></td>
                            <td><a href="#" data-name="squat1">{{ $lifter->squat1 }}</a></td>
                            <td><a href="#" data-name="bench1">{{ $lifter->bench1 }}</a></td>
                            <td><a href="#" data-name="deadlift1">{{ $lifter->deadlift1 }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection