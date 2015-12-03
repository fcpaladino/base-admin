<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class Locale
{

    public function handle($request, Closure $next) {

        $lang = Session::get('lang_', Config::get('app.locale'));
        App::setLocale($lang);

        Session::set('lang_', $lang);

        return $next($request);

    }

}
