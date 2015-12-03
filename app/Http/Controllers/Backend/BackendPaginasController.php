<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UsuarioRequest;
use App\Models\Paginas;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use yajra\Datatables\Datatables;

class BackendPaginasController extends BackendBaseController
{

    private $viewPath   = "backend.pages.paginas.";
    private $routePath  = "admin.paginas.";
    private $titulo     = "Páginas";
    private $subtitulo  = "";


    public function index(){
        $this->wbd->setTitle($this->titulo);
        $this->wbd->setValue('pageTitle',   $this->titulo);
        $this->wbd->setValue('subTitle',    $this->subtitulo);

        return $this->wbd->view($this->viewPath.'index');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id){
        $this->wbd->setTitle('Edição');

        $data = Paginas::find($id)->first();

        $this->wbd->setValue('item', $data);
        return $this->wbd->view($this->viewPath.'edit');
    }


    public function update($id)
    {

        $input      = Input::all();
        $item       = Paginas::find($id);

        $item->seo_titulo       = $input['seo_titulo'];
        $item->seo_descricao    = $input['seo_descricao'];
        $item->seo_palavra_chave= $input['seo_palavra_chave'];

        $item->save();

        flash()->success('Sucesso!', 'Alterado com sucesso.');
        return Redirect::route($this->routePath.'index');
    }


    public function listingAjax(){

        $this->gridView->_route = 'admin.paginas';
        $data = Paginas::select('id', 'seo_titulo', 'slug');

        $this->gridView->btnEdit();

        return Datatables::of($data)
            ->edit_column('id', $this->gridView->listAddChk())
            ->edit_column('ativo', function($data){ return $this->gridView->listStatus($data); })
            ->edit_column('slug', function($data){
                $slug = $data->slug;

                if( $slug == "home" ){ $slug = ""; }
                if( $slug == "produto" ){ $slug = "produtos"; }

                return "<a target='_blank' href=\"".url('/').'/'.$slug."\">".url('/').'/'.$slug."</a>";
            })
            ->add_column('buttons', $this->gridView->listGroupButton(false))
            ->make();
    }

}
