<?php

namespace App\Http\Middleware;

use Closure;

class ValidateUrl
{
    public function handle($request, Closure $next)
    {
        $imgUrl = $request->input('img_url');
        
        // Validación de la URL (puedes mejorar la validación según tus requisitos)
        if (!filter_var($imgUrl, FILTER_VALIDATE_URL)) {
            return redirect('/')->with('error', 'La URL de la imagen no es válida');
        }

        return $next($request);
    }
}


