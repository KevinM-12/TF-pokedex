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
}