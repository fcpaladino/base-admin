@extends('backend.layouts.master')


@section('content')
    @include('backend.partials.pagetitle')

    {!! Form::open(['route' => getRoute('.').'.store', 'method' => 'post', 'id' => 'form-padrao', 'class' => '']) !!}
    @include('backend.pages.usuario.form')
    {!! Form::close() !!}
@stop



@section('content2')
    <section class="content-header">
        <div class="col-lg-6">
            <h1>Titulo <small>Subtitulo</small></h1>
        </div>
        <div class="col-lg-6">
            <a id="submit-form" data-submit-form-id="form-padrao" class="btn-animate blue pull-right" href="#"><i class="fa fa-refresh"></i>Cadastrar</a>
        </div>
        <div class="col-lg-12"><hr></div>
    </section>


    <div id="form-filtro" class="col-lg-12">
        <div class="row">

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control filtro" data-column="1">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Usúario</label>
                    <input type="text" class="form-control filtro" data-column="3">
                </div>
            </div>

        </div>
        <hr>
    </div>

    <div class="col-lg-12">
        <table class="table dataTable" data-filtro="false" data-ordem="asc" data-ordem-column="1" data-ajax="{{ URL::route('listUsuario') }}">
            <thead>
            <tr>
                <th width="1%">
                    <div class="checkbox-input">
                        <input class="chkTodos" type="checkbox" value="" id="checkbox" name="check">
                        <label for="checkbox"></label>
                    </div>
                </th>
                <th class="filtrar" data-tipo="text" data-titulo="Busca por nome">Nome</th>
                <th>E-mail</th>
                <th>Usúario</th>
                <th width="50px" class="filtrar" data-tipo="select" data-titulo="Status">Ativo</th>
                <th width="50px"></th>
            </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>
@stop
