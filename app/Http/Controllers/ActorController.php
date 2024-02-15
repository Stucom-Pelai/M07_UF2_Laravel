<?php

// app/Http/Controllers/ActorController.php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa la clase DB para usar QueryBuilder

class ActorController extends Controller
{
    public function listActors()
    {
        // Utiliza QueryBuilder para obtener los datos de la tabla cinema.actors
        $actors = DB::table('cinema.actors')->get();

        // Convierte los resultados en una colección
        $actorsCollection = collect($actors);

        return view('actors.list', ['actors' => $actorsCollection]);
    }

    public function listActorsByDecade(Request $request)
    {
        $year = $request->input('year');
        $startYear = intval(substr($year, 0, 3) . '0'); // Obtener el inicio de la década
        
        $actors = DB::table('cinema.actors')
                    ->whereYear('birthdate', '>=', $startYear)
                    ->whereYear('birthdate', '<', $startYear + 10) // Incrementa en 10 para obtener el final de la década
                    ->get();
        
        return view('actors.bydecade', compact('actors', 'year'));
    }
    

    public function countActors()
    {
        $actorCount = DB::table('cinema.actors')->count(); // Contar los actores en la base de datos
    
        return view('actors.count', compact('actorCount'));
    }

    public function deleteActor($id)
    {
        // Eliminar el actor por su ID utilizando QueryBuilder
        $result = DB::table('cinema.actors')->where('id', $id)->delete();
    
        // Verificar si se eliminó correctamente
        if ($result) {
            return response()->json([
                'action' => 'delete',
                'status' => true,
                'message' => 'Actor deleted successfully'
            ]);
        } else {
            return response()->json([
                'action' => 'delete',
                'status' => false,
                'message' => 'Failed to delete actor'
            ], 500);
        }
}

}