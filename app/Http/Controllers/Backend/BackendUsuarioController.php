<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UsuarioRequest;
use App\Models\Pessoa;
use App\Models\Usuario;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use yajra\Datatables\Datatables;

class BackendUsuarioController extends BackendBaseController
{

    private $viewPath   = "backend.pages.usuario.";
    private $routePath  = "admin.usuario.";
    private $titulo     = "Usúarios";
    private $subtitulo  = "";


    public function index(){
        $this->wbd->setTitle($this->titulo);
        $this->wbd->setValue('pageTitle',   $this->titulo);
        $this->wbd->setValue('subTitle',    $this->subtitulo);

        return $this->wbd->view($this->viewPath.'index');
    }


    public function create(){
        $this->wbd->setTitle($this->titulo);
        $this->wbd->setValue('pageTitle',    $this->titulo);
        $this->wbd->setValue('subTitle',     "Adicionar");

        return $this->wbd->view($this->viewPath.'create');
    }


    public function store(){

        $input      = Input::all();

        $usuario    = new Usuario();

        if( $input['senha'] != $input['confirma_senha'] ){
            return Redirect::back()->withInput()->with('custom_error', ['As senhas não são iguais.']);
        }

        $usuario->nome       = $input['nome'];
        $usuario->email      = $input['email'];
        $usuario->usuario    = $input['usuario'];
        $usuario->password   = Hash::make($input['senha']);

        $usuario->save();

        flash()->success('Sucesso!', 'Cadastrado com sucesso.');
        return Redirect::route($this->routePath.'index');

    }


    public function edit($id){
        $this->wbd->setTitle('Edição');

        $usuario = Usuario::find($id);

        if(is_null($usuario)){
            flash()->error('Erro', 'Usúario não encontrado');
            return Redirect::route($this->routePath.'index');
        }

        $this->wbd->setValue('item', $usuario);
        return $this->wbd->view($this->viewPath.'edit');
    }


    public function update($id)
    {

        $input      = Input::all();

        $usuario    = Usuario::find($id);

        if( !is_null($input['senha']) && ($input['senha'] != $input['confirma_senha']) ){
            return Redirect::back()->withInput()->with('custom_error', ['As senhas não são iguais.']);
        }

        $usuario->nome       = $input['nome'];
        $usuario->email      = $input['email'];
        $usuario->usuario    = $input['usuario'];
        $usuario->password   = Hash::make($input['senha']);

        $usuario->save();


        flash()->success('Sucesso!', 'Alterado com sucesso.');
        return Redirect::route($this->routePath.'index');
    }


    public function destroy($id){
        return Usuario::destroy($id);
    }


    public function listingAjax(){

        $this->gridView->_route = 'admin.usuario';
        $data = Usuario::select('id', 'nome', 'email', 'usuario', 'ativo');

        return Datatables::of($data)
            ->edit_column('id', $this->gridView->listAddChk())
            ->edit_column('ativo', function($data){ return $this->gridView->listStatus($data); })
//            ->add_column('buttons', $this->gridView->listGroupButton())
            ->make();
    }


    public function ativar($id){
        $user   = Usuario::find($id);
        $user->ativo = '1';
        return $user->save() ? "1" : "0";
    }


    public function desativar($id){
        $user   = Usuario::find($id);
        $user->ativo = '0';
        return $user->save() ? "1" : "0";
    }
}
