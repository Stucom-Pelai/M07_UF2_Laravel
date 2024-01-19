<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array {
        $films = Storage::json('/public/films.json');
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }else if((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)){
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }else if(!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    
    public function listAllFilmsDescending()
    {
        $title = "Listado de todas las Películas Ordenadas por Año Descendente";
        $films = FilmController::readFilms();
    
        // Ordenar por año de forma descendente
        usort($films, function($a, $b) {
            return $b['year'] <=> $a['year'];
        });
    
        return view('films.list', ["films" => $films, "title" => $title]);
    }
  
    public function filmCount()
    {
        $films = FilmController::readFilms();
        $filmCount = count($films);
    
        $title = "Número Total de Películas";
    
        return view('count', ["filmCount" => $filmCount, "title" => $title]);
    }
    
    public function createFilm(Request $request)
    {
        // Obtener el contenido actual del archivo JSON
        $films = json_decode(file_get_contents(storage_path('app/public/films.json')), true);
    
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|unique:peliculas',
            'year' => 'required|integer',
            'genre' => 'required',
            'country' => 'required',
            'duration' => 'required|integer',
            'img_url' => 'required|url',
        ]);
    
        // Verificar si la película ya existe
        foreach ($films as $film) {
            if ($film['name'] === $validatedData['name']) {
                return redirect('/')->with('error', 'La película ya existe');
            }
        }
    
        // Verificar si la URL de la imagen es válida
        $imageSize = @getimagesize($validatedData['img_url']);
        if ($imageSize === false) {
            return redirect('/')->with('error', 'La URL de la imagen no es válida');
        }
    
        // Agregar la nueva película al arreglo de películas
        $films[] = [
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
            'genre' => $validatedData['genre'],
            'country' => $validatedData['country'],
            'duration' => $validatedData['duration'],
            'img_url' => $validatedData['img_url'],
        ];
    
        // Guardar los datos actualizados en el archivo JSON
        file_put_contents(storage_path('app/public/films.json'), json_encode($films));
    
        // Redirigir a la vista de películas con los datos actualizados
        return redirect('/')->with('success', 'Película agregada correctamente');
    }
    
    
}