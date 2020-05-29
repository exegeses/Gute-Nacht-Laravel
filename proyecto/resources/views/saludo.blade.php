<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <header class="bg-dark p-4 text-light">
        encanezado
    </header>
    <main class="container">
        <h1>Hola mundo desde una Vista</h1>

        tu nombre es: {{ $nombre }}

        <ul>
        @for( $n=0; $n<$numero; $n++ )
            <li>{{$n}}</li>
        @endfor
        </ul>

    </main>


</body>
</html>
