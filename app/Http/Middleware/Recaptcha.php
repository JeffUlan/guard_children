<?php
/**
 * @file app/Http/Middleware/Recaptcha.php
 */

namespace App\Http\Middleware;

use Closure;
use ReCaptcha\ReCaptcha as GoogleRecaptcha;

class Recaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = (new GoogleRecaptcha(config('recaptchav3.secret')))
            ->verify($request->input('g-recaptcha-response'), $request->ip());

        if (!$response->isSuccess()) {
            return redirect()->back()->with('status', 'Recaptcha failed. Please try again.');
        }

        return $next($request);
    }
}