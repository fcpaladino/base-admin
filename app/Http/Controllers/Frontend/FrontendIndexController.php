<?php

namespace App\Http\Controllers\Frontend;


class FrontendIndexController extends FrontendBaseController
{

    public function index(){
        return $this->wbd->view('frontend.pages.index.index');
    }

}
