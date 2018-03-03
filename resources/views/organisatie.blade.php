@extends('layouts.default')

@section('title', 'Organisatie')

@section('scripts')
    <script src="{{ asset('js/organisatie.js') }}"></script>
@endsection

@section('content')
    <div class="organisatie">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <p>Hieronder kan de organisatie de gegevens van alle lifters invullen voordat de wedstrijd begint.</p>
                <table class="table lifters">
                    <thead>
                    <tr>
                        <th scope="col">Lot #</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Leeftijd</th>
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
                            <td><a class="editable" href="#" data-name="lotnummer">{{ $lifter->lotnummer }}</a></td>
                            <td class="autoWidth"><a class="editable" href="#" data-name="naam">{{ $lifter->naam }}</a></td>
                            <td><a class="editable" href="#" data-type="text" data-name="leeftijd">{{ $lifter->leeftijd }}</a></td>
                            <td><a class="editable" href="#" data-type="select" data-source="[{text: 'Mannen', children: ['59kg', '66kg', '74kg', '83kg', '93kg', '105kg', '120kg', '+120kg']}, {text: 'Vrouwen', children: ['47kg', '52kg', '57kg', '63kg', '72kg', '84kg', '+84kg']}]" data-name="gewichtsklasse">{{ $lifter->gewichtsklasse }}</a></td>
                            <td><a class="editable" href="#" data-type="text" data-name="bodyweight">{{ $lifter->bodyweight }}</a></td>
                            <td><a class="editable" href="#" data-type="text" data-name="rekHoogteSquat">{{ $lifter->rekHoogteSquat }}</a></td>
                            <td><a class="editable" href="#" data-type="text" data-name="rekHoogteBench">{{ $lifter->rekHoogteBench }}</a></td>
                            @component('components.beurt', ['beurt' => $lifter->beurten->squat()->eerste()->first(), 'lift' => 'squat1'])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->bench()->eerste()->first(), 'lift' => 'bench1'])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->deadlift()->eerste()->first(), 'lift' => 'deadlift1'])@endcomponent
                            <td><a href="{{ route('delete.lifter', $lifter) }}"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                    <tr class="newLifter">
                        <td colspan="11" class="autoWidth"><a href="#" data-placeholder="Vul hier een naam in" data-name="naam"></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection