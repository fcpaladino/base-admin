@extends('backend.layouts.master')

@section('content')
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header ">
                @include('backend.partials.pagetitle')
            </div>
            <div class="box-body">
                <input type="hidden" value="{!! $_action_massa !!}" id="_action_massa">
                <table class="table dataTable dataTable-tools" data-nosort="0,2" data-button-export="print,xls" data-exported="1,2" data-default-sort="3" data-default-sort-dir="asc" data-ajax="{{ URL::route('listUsuario') }}">
                    <thead>
                    <tr>
                        <th width="1%">
                            <div class="checkbox-input">
                                <input class="chkTodos" type="checkbox" value="" id="checkbox" name="check">
                                <label for="checkbox"></label>
                            </div>
                        </th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Usúario</th>
                        <th width="50px">Ativo</th>
                        <th width="50px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
