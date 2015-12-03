@extends('backend.layouts.master')

@section('content')
    <div class="box box-default">
        <div class="box-header">
            @include('backend.partials.pagetitle')
        </div>
        <div class="box-body">
            {!! Form::open(['route' => getRoute('.').'.store', 'method' => 'post', 'id' => 'form-padrao', 'class' => '']) !!}
            <div class="col-lg-12">
                <div class="row">
                    @include('backend.pages.usuario.form')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
