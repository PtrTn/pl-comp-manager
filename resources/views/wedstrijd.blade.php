@extends('layouts.default')

@section('title', 'Wedstrijd')

@section('scripts')
    <script src="{{ asset('js/wedstrijd.js') }}"></script>
@endsection

@section('content')
    <div class="lifters">
        <div class="row ">
            <div class="col-md-12 col-xs-12">
                <p>Hieronder kunnen de lifts gedurende de wedstrijd bijgewerkt worden door de wedstrijdleiding.</p>
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
                            @component('components.beurt', ['beurt' => $lifter->beurten->squat()->eerste()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->squat()->tweede()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->squat()->derde()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->bench()->eerste()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->bench()->tweede()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->bench()->derde()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->deadlift()->eerste()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->deadlift()->tweede()->first()])@endcomponent
                            @component('components.beurt', ['beurt' => $lifter->beurten->deadlift()->derde()->first()])@endcomponent
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection