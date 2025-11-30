<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller{
    public function welcome(){
        $response = Http::get("https://pokeapi.co/api/v2/pokemon?limit=1025");
        $pokemons=$response->json()['results'];
        foreach ($pokemons as $id => $pokemon){
            $pokemons[$id]['id'] = basename($pokemon['url']);
        }
        return view('welcome', compact('pokemons'));
    }

    public function show($id){
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/$id");
        $pokemon = $response->json();

    $speciesResponse = Http::get($pokemon['species']['url']);
    $speciesData = $speciesResponse->json();
    $evolutionChainResponse = Http::get($speciesData['evolution_chain']['url']);
    $evolutionChain = $evolutionChainResponse->json();

    $evolutions = [];
    $current = $evolutionChain['chain'];
    do {
        $name = $current['species']['name'];
        $pokeData = Http::get("https://pokeapi.co/api/v2/pokemon/$name")->json();
        $sprite = $pokeData['sprites']['front_default'] ?? '';
        $evolutions[] = [
            'name' => $name,
            'sprite' => $sprite
        ];
        $current = $current['evolves_to'][0] ?? null;
    } while ($current);

    return view('pokemon', compact('pokemon', 'evolutions'));
}
}