@extends('backend.layouts.master')

@section('content')
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header ">
                <section class="content-header">
                    <div class="col-lg-12">
                        <h1>{!! $pageTitle or '' !!}<small>{{ $subTitle or '' }}</small> </h1>
                    </div>

                </section>
            </div>
            <div class="box-body">
                <input type="hidden" value="" id="_action_massa">
                <table class="table dataTable dataTable-tools" data-nosort="0,1" data-button-export="" data-exported="1,2" data-default-sort="1" data-default-sort-dir="asc" data-ajax="{{ URL::route('listPagina') }}">
                    <thead>
                    <tr>
                        <th width="1%">
                            <div class="checkbox-input">
                                <input class="chkTodos" type="checkbox" value="" id="checkbox" name="check">
                                <label for="checkbox"></label>
                            </div>
                        </th>
                        <th>Título</th>
                        <th>Página</th>
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
