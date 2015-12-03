<?php

namespace App\Http\Controllers\Backend;

use App\Models\Configuracao;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BackendConfiguracaoController extends BackendBaseController
{

    public function index(){
        $this->wbd->setTitle(trans('admin.configuracao'));

        $item = Configuracao::find(1);

        $this->wbd->setValue('item', $item);
        return $this->wbd->view('backend.pages.configuracao.index');
    }


    public function update($id){
        $input      = Input::all();

        $item     = Configuracao::find($id);

        $item->nome_site                = $input['nome_site'];
        $item->titulo_site              = $input['titulo_site'];
        $item->descricao                = $input['descricao'];
        $item->palavra_chave            = $input['palavra_chave'];

        $item->smtp_servidor            = $input['smtp_servidor'];
        $item->smtp_porta               = $input['smtp_porta'];
        $item->smtp_seguranca           = $input['smtp_seguranca'];
        $item->smtp_email_resposta      = $input['smtp_email_resposta'];
        $item->smtp_usuario             = $input['smtp_usuario'];
        $item->smtp_senha               = $input['smtp_senha'];

        $item->social_facebook          = $input['social_facebook'];
        $item->social_instagram         = $input['social_instagram'];
        $item->social_skype             = $input['social_skype'];

        $item->google_analytics         = $input['google_analytics'];
        $item->google_tag_manager       = $input['google_tag_manager'];
        $item->analises_outros          = $input['analises_outros'];

        $item->contato_email            = $input['contato_email'];
        #$item->contato_emailcopia       = $input['contato_emailcopia'];
        #$item->contato_emailcopiaoculta = $input['contato_emailcopiaoculta'];

        $item->orcamento_email            = $input['orcamento_email'];
        #$item->orcamento_emailcopia       = $input['orcamento_emailcopia'];
        #$item->orcamento_emailcopiaoculta = $input['orcamento_emailcopiaoculta'];

        $item->save();

        flash()->success(trans('admin.sucesso'), trans('admin.msg_registro_alterar_sucesso'));
        return Redirect::route('admin.configuracao.index');
    }

}
