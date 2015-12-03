
<div class="col-lg-12">

    <div class="form-group">
        <label class="control-label required">Nome</label>
        <div class="form-controls clearfix">
            <div class="col-lg-6 row">
                {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label required">Nome</label>
        <div class="form-controls clearfix">
            <div class="col-lg-6 row">
                {!! Form::text('nome', null, ['class'=>'form-control data', 'required']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label required">Nome</label>
        <div class="form-controls clearfix">
            <div class="col-lg-6 row">
                {!! Form::text('nome', null, ['class'=>'form-control hora', 'required']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label required">Nome</label>
        <div class="form-controls clearfix">
            <div class="col-lg-6 row">
                {!! Form::text('nome', null, ['class'=>'form-control datahora', 'required']) !!}
            </div>
        </div>
    </div>

</div>




<div class="col-lg-12">
    <br><br>
    <a href="{!! URL::previous() !!}" class="btn-animate gray mr-r-5">{{trans('admin.btn.voltar')}}</a>
    <input type="submit" class="btn-animate blue" value="{{trans('admin.btn.cadastrar')}}">
</div>

