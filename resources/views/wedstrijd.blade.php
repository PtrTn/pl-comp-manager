<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beginnerswedstrijd 2018</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Javascript Files -->
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container wedstrijdleider">
    <h1 class="display-4">Beginnerswedstrijd 2018</h1>


    @if (count($lifters) == 0)
        <p>Er zijn geen lifters ingevoerd</p>
    @else
        <table class="table table-hover lifters">
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
                    <td><a href="#" data-name="squat1">{{ $lifter->squat1 }}</a></td>
                    <td><a href="#" data-name="squat2">{{ $lifter->squat2 }}</a></td>
                    <td><a href="#" data-name="squat3">{{ $lifter->squat3 }}</a></td>
                    <td><a href="#" data-name="bench1">{{ $lifter->bench1 }}</a></td>
                    <td><a href="#" data-name="bench2">{{ $lifter->bench2 }}</a></td>
                    <td><a href="#" data-name="bench3">{{ $lifter->bench3 }}</a></td>
                    <td><a href="#" data-name="deadlift1">{{ $lifter->deadlift1 }}</a></td>
                    <td><a href="#" data-name="deadlift2">{{ $lifter->deadlift2 }}</a></td>
                    <td><a href="#" data-name="deadlift3">{{ $lifter->deadlift3 }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
