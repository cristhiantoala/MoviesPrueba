<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function rent(Request $request, $movieId)
{
    $movie = Movie::findOrFail($movieId);

    if (!$movie->available) {
        return response()->json(['message' => 'Esta película no está disponible para alquiler'], 400);
    }

    $rental = new Rental();
    $rental->user_id = Auth::id();
    $rental->movie_id = $movie->id;
    $rental->rental_date = now();
    // Establece return_date u otros campos según sea necesario
    $rental->save();

    // Actualizar disponibilidad de la película
    $movie->available = false;
    $movie->save();

    return response()->json(['message' => 'Película alquilada con éxito']);
}
}
