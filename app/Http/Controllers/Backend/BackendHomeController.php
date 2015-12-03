<?php

namespace App\Http\Controllers\Backend;

class BackendHomeController extends BackendBaseController
{

    protected $titulo       = "Formulario";
    protected $subtitulo    = "usuario";

    public function index(){
        $this->wbd->setTitle('Home');
        $this->wbd->setValue('titulo',       $this->titulo);
        $this->wbd->setValue('subtitulo',    $this->subtitulo);
        return $this->wbd->view('backend.pages.home.index');
    }

}
