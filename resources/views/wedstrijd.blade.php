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
                        @php
                        $squat1 = $lifter->beurten->squat()->eerste()->first();
                        $squat2 = $lifter->beurten->squat()->tweede()->first();
                        $squat3 = $lifter->beurten->squat()->derde()->first();
                        $bench1 = $lifter->beurten->bench()->eerste()->first();
                        $bench2 = $lifter->beurten->bench()->tweede()->first();
                        $bench3 = $lifter->beurten->bench()->derde()->first();
                        $deadlift1 = $lifter->beurten->deadlift()->eerste()->first();
                        $deadlift2 = $lifter->beurten->deadlift()->tweede()->first();
                        $deadlift3 = $lifter->beurten->deadlift()->derde()->first();
                        @endphp
                        <tr data-pk="{{ $lifter->id }}">
                            <td>{{ $lifter->naam }}</td>
                            @component('components.beurt', ['beurt' => $squat1])@endcomponent
                            @component('components.beurt', ['beurt' => $squat2])@endcomponent
                            @component('components.beurt', ['beurt' => $squat3])@endcomponent
                            @component('components.beurt', ['beurt' => $bench1])@endcomponent
                            @component('components.beurt', ['beurt' => $bench2])@endcomponent
                            @component('components.beurt', ['beurt' => $bench3])@endcomponent
                            @component('components.beurt', ['beurt' => $deadlift1])@endcomponent
                            @component('components.beurt', ['beurt' => $deadlift2])@endcomponent
                            @component('components.beurt', ['beurt' => $deadlift3])@endcomponent
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection