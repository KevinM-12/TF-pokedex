<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pokémon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    {{-- ASSET: generar la URL completa de un archivo público dentro de la carpeta public --}}
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4 text-center">Pokédex</h1>
        <div class="row g-4">
            @foreach ($pokemons as $pokemon)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card text-center shadow-sm">
                    <img 
                        src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{ $pokemon['id'] }}.png" 
                        class="card-img-top p-3 pokemon-img"
                        alt="{{ $pokemon['name'] }}"
                    >
                    <div class="card-body">
                        <p class="text-muted mb-1 pokemon-id">
                            N°{{ sprintf('%04d', $pokemon['id']) }}
                            {{-- sprintf es una función de PHP que se utiliza para formatear cadenas de manera flexible
                            Sintaxis: sprintf("formato", valor1, valor2, ...); --}}
                        </p>
                        <h5 class="card-title text-capitalize pokemon-name">
                            {{ $pokemon['name'] }}
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>