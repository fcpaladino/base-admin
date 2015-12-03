@extends('backend.layouts.master')

@section('content')
    <div class="box box-default">
        <div class="box-header">
            @include('backend.partials.pagetitle')
        </div>
        <div class="box-body">
            {!! Form::model( $item, ['id' => 'form-padrao', 'class' => '', 'method' => 'PATCH', 'route' => [ getRoute('.').'.update', $item->id] ]) !!}
            <div class="col-lg-12">
                <div class="row">
                    @include('backend.pages.usuario.form')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
