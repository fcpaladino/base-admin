<div class="col-lg-12">
    <div class="form-group">
        {!! Form::label('seo_titulo', Lang::get('admin.titulo')) !!}
        {!! Form::text('seo_titulo', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        {!! Form::label('seo_descricao', Lang::get('admin.descricao')) !!}
        {!! Form::textarea('seo_descricao', null, ['class'=>'form-control', 'rows'=>5]) !!}
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        {!! Form::label('seo_palavra_chave', Lang::get('admin.palavra_chave')) !!}
        {!! Form::text('seo_palavra_chave', null, ['class'=>'form-control tags']) !!}
    </div>
</div>

