<?php

namespace App\Libs\DataOperation;

class GridView {

    /**
     * Nome da rota que será usada para edit e show
     *
     * @var string
     */
    public $_route = '';


    public $_parent_id = null;


    /**
     * Coluna que sera usada em mensagens de alerta.
     * default: nome
     *
     * @var string
     */
    public $_name = 'nome';



    public  $_buttons = '<div class="dropdown_acao_grid dropdown pull-right"><button class="btn-animate gray dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></button><ul class="dropdown-menu" role="menu">';




    /**
     * Botões que serão exibidos para execução em massa.
     * Separação por ponto-e-vírgula sem espaços
     * default: Exclusão, Status (ativar/desativar)
     *
     * @var string
     */
    private $_actions_massa = ['ativar', 'desativar', 'excluir'];


    private $settings_action_massa = [
        'ativar'        => ['icon'=>'eye',          'title'=>'Ativar',          'multiple'=>true],
        'desativar'     => ['icon'=>'eye-slash',    'title'=>'Desativar',       'multiple'=>true],
        //'excluir'       => ['icon'=>'trash-o',      'title'=>'Excluir',         'multiple'=>true],
        //'destacar'      => ['icon'=>'check-square-o','title'=>'Destacar',        'multiple'=>true],
        //'naodestacar'   => ['icon'=>'square-o',      'title'=>'Remover destaque','multiple'=>true],
    ];





    /**
     * Criação padrão de listagens.
     * Pode ser sobrescrita em caso de pesquisa específica
     *
     * @param $data object Eloquent
     * @return mixed
     */
    public function listAjax($data){

        return Datatables::of($data)
            ->edit_column('id', '<input type="checkbox" class="chkId" value="{{ $id }}">')
            ->edit_column('ativo', $this->ativo)
            ->add_column('buttons', $this->listGroupButton())
            ->make();
    }

    public function listImage($image, $path = 'uploads/'){
        return '<div class="image"><a rel="gallery" href="'.asset($path.$image).'" class=""><img src="'.asset($path.$image).'" height="60px" width="80px" ></a></div>';
    }

    public function listStatus($item){
        $cor  = "black";
        $acao = "desativar";
        $txt  = "desativado";

        if($item->ativo == 1){
            $cor  = "green";
            $acao = "ativar";
            $txt  = "ativado";
        }
        return $this->lstStatus($cor, $acao, $txt);
    }


    public function listDestaque($item){
        $cor  = "black";
        $acao = "naodestacar";
        $txt  = "sem destaque";

        if($item->destaque){
            $cor  = "green";
            $acao = "destacar";
            $txt  = "descatado";
        }
        return $this->lstStatus($cor, $acao, $txt);
    }


    public function listAddChk(){
        return '<div class="checkbox-input"><input class="chkItem" type="checkbox" value="{{$id}}" id="checkbox{{$id}}" name="check"><label for="checkbox{{$id}}"></label></div>';
    }


    public function listOrder($order){
        return '<input type="hidden" class="itemOrdem" value="'.$order.'"> <span class="numOrdem">'.$order.'</span>';
    }

    private function lstStatus($c, $a, $t){
        return "<span class=\"lst-tb-status ".$c."\" data-action=\"".$a."\">".$t."</span>";
    }






    /***** Buttons *****/

    /**
     * Adiciona Ordenanar na gridview
     */
    public function btnOrder(){
        return '<i class="orderList fa fa-arrows"></i>';
    }


    /**
     * Adiciona Ativação/Desativação ao agrupamento de botões
     */
    public function btnStatus(){
        $this->_buttons .= '<li role="presentation"><a role="menuitem" href="#" data-id="{{$id}}" class="btn_drop_row_grid" data-status="ativar;desativar" data-bg="green;black" data-bg-active="green" data-text="ativado" data-action="ativar"><i class="fa fa-check"></i> Ativar</a></li>';
        $this->_buttons .= '<li role="presentation"><a role="menuitem" href="#" data-id="{{$id}}" class="btn_drop_row_grid" data-status="ativar;desativar" data-bg="green;black" data-bg-active="black" data-text="desativado" data-action="desativar"><i class="fa fa-close"></i> Desativar</a></li>';
    }


    /**
     * Adiciona Destaque ao agrupamento de botões
     */
    public function btnDestaque(){
        $this->_buttons .= '<li role="presentation"><a role="menuitem" href="#" data-id="{{$id}}" class="btn_drop_row_grid" data-status="destacar;naodestacar" data-bg="green;black" data-bg-active="green" data-text="destacado" data-action="destacar"><i class="fa fa-check-square-o"></i> Destacar</a></li>';
        $this->_buttons .= '<li role="presentation"><a role="menuitem" href="#" data-id="{{$id}}" class="btn_drop_row_grid" data-status="destacar;naodestacar" data-bg="green;black" data-bg-active="black" data-text="não destacado" data-action="naodestacar"><i class="fa fa-square-o"></i> Não destacar</a></li>';
    }


    /**
     * Adiciona deleção ao agrupamento de botões
     */
    public function btnDelete(){
        $this->_buttons .= '<li role="presentation"><a role="menuitem" href="#" data-id="{{$id}}" class="btn_drop_row_grid" data-status="excluir" data-bg="" data-bg-active="" data-text="" data-action="excluir"><i class="fa fa-trash-o"></i> Deletar</a></li>';
    }


    /**
     * Adiciona visualização ao agrupamento de botões
     */
    public function btnShow(){
        $route = '{{ URL::route(\''.$this->_route.'.show\', $id) }}';
        $this->_buttons .= '<li role="presentation"><a role="menuitem" href="'.$route.'" class="btn_drop_row_grid"><i class="fa fa-search"></i> Ver</a></li>';
    }


    /**
     * Adiciona edição ao agrupamento de botões
     */
    public function btnEdit(){

        if(empty($this->_parent_id)) {
            $route = '{{ URL::route(\''.$this->_route.'.edit\', $id) }}';
        }
        else {
            $route = '{{ URL::route(\''.$this->_route.'.edit\', ['.$this->_parent_id.', $id]) }}';
        }

        $this->_buttons .= '<li role="presentation"><a role="menuitem" class="btn_drop_row_grid" href="'.$route.'"><i class="fa fa-pencil"></i> Editar</a></li>';
    }




    /**
     * Gera agrupamento de botões.
     * default: edit;delete;status(active,desactive)
     *
     * @param bool|true $isComplete
     * @return string
     */
    public function listGroupButton($isComplete = true){

        if($isComplete) {
            $this->btnEdit();
            $this->btnDelete();
            $this->btnStatus();
        }

        $this->_buttons .= '</ul></div>';
        return $this->_buttons;
    }


    public function listGroupButtonMassa(){
        $html  = "<div id='dropdown_acao_massa' class='dropdown pull-left' style='opacity: 0'><button class='btn-animate gray dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-cog'></i>&numsp;".trans('admin.acoes')."&numsp;<span class='caret'></span></button>";
        $html .= "<ul class='dropdown-menu' role='menu'>";

        foreach ($this->settings_action_massa as $action => $config) {
            if($config['multiple'])
                $html .= "<li role='presentation'><a role='menuitem' href='' data-action='".$action."' class='btn_drop_massa_grid'> ".(isset($config['icon']) ? "<i class='fa fa-".$config['icon']."'></i>" : "")." ".$config['title']." selecionados</a></li>";
        }

        $html .= "</ul></div>";
        return $html;
    }




    /**
     * Obtém os botões de ação massiva
     *
     * @return string
     */
    public function getActions()
    {
        return implode(';', $this->_actions_massa);
    }

    /**
     * Modifica os botões de ação massiva
     * Usar separação por ponto-e-vírgula sem espaços
     * default: Exclusão, Status (ativar/desativar)
     *
     * @param $action
     * @param array $setting
     */
    public function setActions($action){
        $this->_actions_massa[] = $action;
    }
}