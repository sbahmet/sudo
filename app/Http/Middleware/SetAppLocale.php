<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;

class SetAppLocale
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */

    protected $app;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $requestedLocale = $this->extractValidLocaleParam($request->get('locale'));
        $savedLocale = $this->extractValidLocaleParam($request->cookie('locale'));

        $locale = $requestedLocale ?: $savedLocale ?: config('app.fallback_locale');
        $this->app->setLocale($locale);

        return $next($request)->withCookie(cookie()->forever('locale', $locale));
    }

    protected function extractValidLocaleParam($locale)
    {
        if (!in_array($locale, config('translatable.locales'))) {
            // reset locale if it is not supported
            $locale = null;
        }

        return $locale;
    }
}
