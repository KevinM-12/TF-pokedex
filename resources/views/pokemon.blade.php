<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stats</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body class="Estadistics">
    <div class="container py-4">
        <h1 class="text-capitalize"></strong>{{ucfirst($pokemon['name'])}}</strong></h1>
        <di class="row mb-4">
        <div class="col-md-6 text-center">
            <img src="{{$pokemon['sprites']['front_default']}}"
             alt="{{$pokemon['name']}}"
             class="poke-img mb-3">
        </div>
        <div class="col-md-6">
            <h4 class="text-center"><strong>Evoluciones</strong></h4>
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                @foreach ($evolutions as $evo)
                    <div class="mx-3 text-center">
                        <img src="{{$evo['sprite']}}"
                             alt="{{$evo['name']}}"
                             class="pokemon-img-small mb-2">
                        <p class="text-capitalize evo-name">{{$evo['name']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-center mb-3">
            <h4></strong>Tipo:</strong></h4>
            @foreach ($pokemon['types'] as $type)
                <span class="type-badge text-capitalize {{'type-'.$type['type']['name']}}">
                    {{$type['type']['name']}}
                </span>
            @endforeach
        </div>

        <div class="col-md-6">
            <h4 class="text-center mb-3"></strong>Estadisticas</strong></h4>
            <table class="table table-bordered text-center table-stats">
                <thead class="table-dark">
                    <tr>
                        <th>Estadistica</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pokemon['stats'] as $stat)
                        <tr>
                            <td class="text-capitalize">{{$stat['stat']['name']}}</td>
                            <td><strong>{{$stat['base_stat']}}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        <div class="text-center mt-4">
            <form action="{{url('/')}}" method="GET">
                <button type="submit" class="btn btn-secondary">Volver</button>
            </form>
        </div>
    </div>
</body>
</html>