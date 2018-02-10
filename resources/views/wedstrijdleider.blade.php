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
<div class="container">
    <h1 class="display-4">Beginnerswedstrijd 2018</h1>


    @if (count($lifters) == 0)
        <p>Er zijn geen lifters ingevoerd</p>
    @else
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
                <tr>
                    <td>{{ $lifter->naam }}</td>
                    <td><a href="#">{{ $lifter->squat1 }}</a></td>
                    <td><a href="#">{{ $lifter->squat2 }}</a></td>
                    <td><a href="#">{{ $lifter->squat3 }}</a></td>
                    <td><a href="#">{{ $lifter->bench1 }}</a></td>
                    <td><a href="#">{{ $lifter->bench2 }}</a></td>
                    <td><a href="#">{{ $lifter->bench3 }}</a></td>
                    <td><a href="#">{{ $lifter->deadlift1 }}</a></td>
                    <td><a href="#">{{ $lifter->deadlift2 }}</a></td>
                    <td><a href="#">{{ $lifter->deadlift3 }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
