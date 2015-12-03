@extends('backend.layouts.master')

@section('content')
<div class="box box-default">
    <div class="box-header">
        <section class="content-header">
            <div class="col-lg-6">
                <h1>{!! trans('admin.configuracao') !!}</h1>
            </div>
            <div class="col-lg-6">
                <a id="submit-form" data-submit-form-id="form-padrao" class="btn-animate blue pull-right" href="#"><i class="fa fa-refresh"></i>{{trans('admin.atualizar')}}</a>
            </div>
            <hr>
        </section>
    </div>
    <div class="box-body">
        {!! Form::model( $item, ['id' => 'form-padrao', 'class' => '', 'method' => 'PATCH', 'route' => [ 'admin.configuracao.update', $item->id] ]) !!}
        @include('backend.pages.configuracao.form')
        {!! Form::close() !!}
    </div>
</div>
@stop































@section('button')
    <a class="btn-animate gray"><i class="fa fa-plus"></i>&numsp;Adicionar</a>
    <a class="btn-animate blue"><i class="fa fa-plus"></i>&numsp;Adicionar</a>
    <a class="btn-animate blue-light"><i class="fa fa-plus"></i>&numsp;Adicionar</a>
    <a class="btn-animate yellow"><i class="fa fa-plus"></i>&numsp;Adicionar</a>
    <a class="btn-animate red"><i class="fa fa-plus"></i>&numsp;Adicionar</a>
@stop




@section('tabs')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Tab 1</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Tab 3</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>
                <p>Exactly like the original bootstrap tabs except you should use
                    the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
            </div>
            <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
            </div>
            <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>
    </div>
@stop

@section('form')
    <div class="box box-default">
        <div class="box-body">

            <form action="">
                <fieldset>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Mascara</label>
                            <input type="text" class="form-control fone">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Mascara</label>
                            <input type="text" class="form-control preco">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="email" class="form-control" id="" placeholder="Nome">

                        <div class="help-block">Informação do campo.</div>
                    </div>

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="email" disabled class="form-control" id="" placeholder="">
                    </div>

                    <div class="form-group">
                        <div class="checkbox-input">
                            <input class="chkTodos" type="checkbox" checked value="" id="checkbox" name="check">
                            <label for="checkbox"></label>

                            <div class="text">item 1</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select class="form-control select" multiple="multiple">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" class="form-control date">
                    </div>

                    <div class="form-group">
                        <label for="">Tags</label>
                        <input type="text" class="form-control tags">
                    </div>

                    <div class="form-group">
                        <label for="">Maxlength</label>
                        <input type="text" class="form-control maxlength" maxlength="10">
                    </div>

                </fieldset>

            </form>

        </div>
    </div>
@stop


@section('datatable')

    <div class="box">
        <div class="box-body">

            <table id="dataTable" class="table dataTable table-striped" data-nosort="0">
                <thead>
                <tr>
                    <th width="1%">
                        <div class="checkbox-input">
                            <input class="chkTodos" type="checkbox" value="" id="checkbox" name="check">
                            <label for="checkbox"></label>
                        </div>
                    </th>
                    <th width="1%">#</th>
                    <th>Titulo</th>
                    <th>Ordem</th>
                    <th>Status</th>
                    <th width="1%"></th>
                </tr>
                </thead>
                <tbody>
                @for($i = 1; $i <= 30; $i++)
                    <?php
                        if($i % 2 == 0){
                            $status_bg = 'black';
                            $status = 'desativar';
                        } else {
                            $status_bg = 'green';
                            $status = 'ativar';
                        }

                    ?>
                <tr>
                    <td>
                        <div class="checkbox-input">
                            <input class="chkItem" type="checkbox" value="{{$i}}" id="checkbox{{$i}}" name="check">
                            <label for="checkbox{{$i}}"></label>
                        </div>
                    </td>
                    <td><i class="orderList fa fa-arrows"></i></td>
                    <td> Item {{$i}} </td>
                    <td><input type="hidden" class="itemOrdem" value="{{$i}}"> <span class="numOrdem">{{$i}}</span></td>
                    <td> <span class="lst-tb-status {{$status_bg}}" data-action="{{$status}}">@if($i % 2 == 0) desativado @else ativado @endif</span> </td>

                    <td>
                        <div class="dropdown_acao_grid dropdown pull-right">
                            <button class="btn-animate gray dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a role="menuitem" href="#" data-id="{{$i}}" class="btn_drop_row_grid" data-status="ativar;desativar;excluir" data-bg="green;black;red" data-bg-active="green" data-text="ativado" data-action="ativar"><i class="fa fa-check"></i> Ativar</a></li>
                                <li role="presentation"><a role="menuitem" href="#" data-id="{{$i}}" class="btn_drop_row_grid" data-status="ativar;desativar;excluir" data-bg="green;black;red" data-bg-active="black" data-text="desativado" data-action="desativar"><i class="fa fa-close"></i> Desativar</a></li>
                                <li role="presentation"><a role="menuitem" href="#" data-id="{{$i}}" class="btn_drop_row_grid" data-status="ativar;desativar;excluir" data-bg="green;black;red" data-bg-active="red" data-text="excluido" data-action="excluir"><i class="fa fa-close"></i> Excluir</a></li>
                                <li role="separator" class="divider"></li>
                                <li role="presentation"><a role="menuitem" href="#" data-id="{{$i}}" class="btn_drop_row_grid" data-status="pagar;naopagar;cancelar" data-bg="green;black;red" data-bg-active="green" data-text="pago" data-action="pagar"><i class="fa fa-check"></i> Pagar</a></li>
                                <li role="presentation"><a role="menuitem" href="#" data-id="{{$i}}" class="btn_drop_row_grid" data-status="pagar;naopagar;cancelar" data-bg="green;black;red" data-bg-active="black" data-text="não pago" data-action="naopagar"><i class="fa fa-close"></i> Remover pagto</a></li>
                                <li role="presentation"><a role="menuitem" href="#" data-id="{{$i}}" class="btn_drop_row_grid" data-status="pagar;naopagar;cancelar" data-bg="green;black;red" data-bg-active="red" data-text="cancelado" data-action="cancelar"><i class="fa fa-close"></i> cancelar</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endfor

                </tbody>
            </table>

        </div>
    </div>
@stop
