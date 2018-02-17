@extends('layouts.default')

@section('scripts')
    <script src="{{ asset('js/wedstrijd.js') }}"></script>
@endsection

@section('content')
    <div class="lifters">
        <div class="row ">
            <div class="col-md-12 col-xs-12">
                <h1 class="display-4">Beginnerswedstrijd 2018</h1>
                <table class="table lifters">
                    <thead>
                    <tr>
                        <th scope="colgroup">Naam</th>
                        <th scope="colgroup" colspan="3">Squat</th>
                        <th scope="colgroup" colspan="3">Bench</th>
                        <th scope="colgroup" colspan="3">Deadlift</th>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">1</th>
                        <th scope="col">2</th>
                        <th scope="col">3</th>
                        <th scope="col">1</th>
                        <th scope="col">2</th>
                        <th scope="col">3</th>
                        <th scope="col">1</th>
                        <th scope="col">2</th>
                        <th scope="col">3</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lifters as $lifter)
                        <tr data-pk="{{ $lifter->id }}">
                            <td>{{ $lifter->naam }}</td>
                            <td><a class="editable" href="#" data-name="squat1">{{ $lifter->beurten->squat()->eerste()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="squat2">{{ $lifter->beurten->squat()->tweede()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="squat3">{{ $lifter->beurten->squat()->derde()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="bench1">{{ $lifter->beurten->bench()->eerste()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="bench2">{{ $lifter->beurten->bench()->tweede()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="bench3">{{ $lifter->beurten->bench()->derde()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="deadlift1">{{ $lifter->beurten->deadlift()->eerste()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="deadlift2">{{ $lifter->beurten->deadlift()->tweede()->gewicht() }}</a></td>
                            <td><a class="editable" href="#" data-name="deadlift3">{{ $lifter->beurten->deadlift()->derde()->gewicht() }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection