<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
 
class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Implement your URL validation logic here
        $urlIsValid = $this->isValidUrl($request->input('img_url'));
        if (!$urlIsValid) {
            // If URL is not valid, redirect to welcome page with an error message
            return response(view('welcome', ["error" => "Invalid Img URL"]));
        }
 
        // Continue with the request if URL is valid
        return $next($request);
    }
 
    /**
     * Check if a URL is valid.
     *
     * @param  string  $url
     * @return bool
     */
    private function isValidUrl($url)
    {
        // Use filter_var with FILTER_VALIDATE_URL to check if the URL is valid
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}