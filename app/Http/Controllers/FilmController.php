<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    /**
     * Read films from storage.
     *
     * @return array
     */
    public static function readFilms(): array
    {
        // Read the JSON file containing film information.
        $films = Storage::get('/public/films.json');
        return json_decode($films, true); // Decode the JSON into an associative array.
    }

    /**
     * List films older than the provided year.
     * If no year is provided, it defaults to 2000.
     *
     * @param int|null $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "List of Old Films (Before $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }

    /**
     * List films newer than the provided year.
     * If no year is provided, it defaults to 2000.
     *
     * @param int|null $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "List of New Films (After $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }

    /**
     * List all films or filter by year or genre.
     *
     * @param int|null $year
     * @param string|null $genre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];
        $title = "List of All Films";
        $films = FilmController::readFilms();

        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "List of All Films Filtered by Year";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "List of All Films Filtered by Genre";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "List of All Films Filtered by Genre and Year";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Display films for a specific year.
     *
     * @param int|null $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filmsByYear($year = null)
    {
        $films_filtered = [];
        $title = "List of All Films";
        $films = FilmController::readFilms();

        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year) {
                $title = "List of All Films Filtered by Year";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Display films for a specific genre.
     *
     * @param string|null $genre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filmsByGenre($genre = null)
    {
        $films_filtered = [];
        $title = "List of All Films";
        $films = FilmController::readFilms();

        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "List of All Films Filtered by Genre";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Sort films by year.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sortByYear()
    {
        $title = "List of Films Sorted by Year";
        $films = FilmController::readFilms();

        // Sort films by year using usort
        usort($films, function ($a, $b) {
            return $a['year'] - $b['year'];
        });

        return view('films.list', ["films" => $films, "title" => $title]);
    }

    /**
     * Count the total number of films.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function countFilms()
    {
        $title = "Total Number of Films";
        $films = FilmController::readFilms();

        $totalFilms = count($films);

        return view('films.countFilms', ["films" => $totalFilms, "title" => $title]);
    }

    /**
     * Check if a film already exists.
     *
     * @param mixed $filmUser
     * @return bool
     */
    public function isFilm($filmUser)
    {
        $films = FilmController::readFilms();
        foreach ($films as $film) {
            if ($film["name"] === $filmUser["name"]) {
                return true;
            }
        }
        return false;
    }

    /**
     * Create a new film.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createFilm(Request $request)
    {
        $title = "All Films";
        $films = FilmController::readFilms();
        $filmUser = [
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'country' => $request->input('country'),
            'duration' => $request->input('duration'),
            'img_url' => $request->input('img_url'),
        ];

        if ($this->isFilm($filmUser)) {
            return view('welcome', ["error" => "Movie already exists"]);
        } else {
            $films[] = $filmUser;
            Storage::put("/public/films.json", json_encode($films));
            $films = FilmController::readFilms();
            return view('films.list', ["films" => $films, "title" => $title]);
        }
    }
}
