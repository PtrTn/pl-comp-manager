@extends('layouts.default')

@section('scripts')
    <script src="{{ asset('js/lifters.js') }}"></script>
@endsection

@section('content')
    <div class="wedstrijd">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h1 class="display-4">Beginnerswedstrijd 2018</h1>

                @if (count($lifters) == 0)
                    <p>Er zijn geen lifters ingevoerd</p>
                @else
                    <table class="table lifters">
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
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($lifters as $lifter)
                            <tr data-pk="{{ $lifter->id }}">
                                <td class="autoWidth"><a class="editable" href="#" data-name="naam">{{ $lifter->naam }}</a></td>
                                <td><a class="editable" href="#" data-name="gewichtsklasse">{{ $lifter->gewichtsklasse }}</a></td>
                                <td><a class="editable" href="#" data-name="bodyweight">{{ $lifter->bodyweight }}</a></td>
                                <td><a class="editable" href="#" data-name="rekHoogteSquat">{{ $lifter->rekHoogteSquat }}</a></td>
                                <td><a class="editable" href="#" data-name="rekHoogteBench">{{ $lifter->rekHoogteBench }}</a></td>
                                <td><a class="editable" href="#" data-name="squat1">{{ $lifter->squat1 }}</a></td>
                                <td><a class="editable" href="#" data-name="bench1">{{ $lifter->bench1 }}</a></td>
                                <td><a class="editable" href="#" data-name="deadlift1">{{ $lifter->deadlift1 }}</a></td>
                                <td><a href="{{ route('delete.lifter', $lifter) }}"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                        <tr class="newLifter">
                            <td colspan="9" class="autoWidth"><a href="#" data-name="naam"></a></td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection