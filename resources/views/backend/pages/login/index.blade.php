@extends('backend.layouts.login')

@section('content')
    <div class="login-box">
        <div class="login-logo">{{ trans('admin.login.titulo') }}</div>
        <div class="login-box-body">

            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
            <div class="form-group">
                {!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => trans('admin.form.usuario'), 'autocomplete'=> 'off', 'autofocus']) !!}
            </div>
            <div class="form-group">
                {!! Form::password('senha', ['class' => 'form-control', 'placeholder' => trans('admin.form.senha')]) !!}
            </div>

            <div class="row">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn-animate blue f-r">{{ trans('admin.btn.entrar') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection


