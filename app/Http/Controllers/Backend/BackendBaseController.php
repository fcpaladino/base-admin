<?php

namespace App\Http\Controllers\Backend;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class BackendBaseController extends Controller
{

    public function language($lang)
    {
        $langAllow = config('app.locales');
        if (array_key_exists(strtolower($lang), $langAllow)) {
            session()->put('lang_', $lang);
            return redirect()->back();
        }

    }

}
