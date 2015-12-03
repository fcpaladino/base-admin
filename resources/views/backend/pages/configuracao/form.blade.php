<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#geral" data-toggle="tab" aria-expanded="false">{!!  trans('admin.geral') !!}</a></li>
        <li class=""><a href="#redesocial" data-toggle="tab" aria-expanded="false">{!!  trans('admin.rede_social') !!}</a></li>
        {{--<li class="dropdown">--}}
            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">{!!  trans('admin.email_notificacao') !!}<span class="caret"></span></a>--}}
            {{--<ul class="dropdown-menu">--}}
                {{--<li role="presentation"><a href="#contato" data-toggle="tab" aria-expanded="false">{!! trans('admin.contato') !!}</a></li>--}}
                {{--<li role="presentation"><a href="#trabalhe_conosco" data-toggle="tab" aria-expanded="false">{!! trans('admin.trabalhe_conosco') !!}</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li class=""><a href="#contato" data-toggle="tab" aria-expanded="true">{!!  trans('admin.contato') !!}</a></li>
        <li class=""><a href="#orcamento" data-toggle="tab" aria-expanded="true">{!!  trans('admin.orcamento') !!}</a></li>
        <li class=""><a href="#configsmtp" data-toggle="tab" aria-expanded="true">{!!  trans('admin.configuracao_smtp') !!}</a></li>
        <li class=""><a href="#analises" data-toggle="tab" aria-expanded="true">{!!  trans('admin.analise') !!}</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="geral">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('nome_site', trans('admin.nome_site')) !!}
                        {!! Form::text('nome_site', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('titulo_site', trans('admin.titulo_site')) !!}
                        {!! Form::text('titulo_site', null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('palavra_chave', trans('admin.palavra_chave')) !!}
                        {!! Form::text('palavra_chave', null, ['class'=>'form-control tags']) !!}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        {!! Form::label('descricao', trans('admin.descricao')) !!}
                        {!! Form::textarea('descricao', null, ['class'=>'form-control no-resize', 'rows'=>4]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="redesocial">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        {!! Form::label('social_facebook', trans('admin.social_facebook')) !!}
                        {!! Form::text('social_facebook', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('social_instagram', trans('admin.social_instagram')) !!}
                        {!! Form::text('social_instagram', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('social_skype', trans('admin.social_skype')) !!}
                        {!! Form::text('social_skype', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="contato">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{!! trans('admin.contato') !!}</h4>
                    <div class="form-group">
                        {!! Form::label('contato_email', trans('admin.email')) !!}
                        {!! Form::text('contato_email', null, ['class'=>'form-control']) !!}
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('contato_emailcopia', trans('admin.email_copia')) !!}--}}
                        {{--{!! Form::text('contato_emailcopia', null, ['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('contato_emailcopiaoculta', trans('admin.email_copia_oculta')) !!}--}}
                        {{--{!! Form::text('contato_emailcopiaoculta', null, ['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="orcamento">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{!! trans('admin.orcamento') !!}</h4>
                    <div class="form-group">
                        {!! Form::label('orcamento_email', trans('admin.email')) !!}
                        {!! Form::text('orcamento_email', null, ['class'=>'form-control']) !!}
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('orcamento_emailcopia', trans('admin.email_copia')) !!}--}}
                        {{--{!! Form::text('orcamento_emailcopia', null, ['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('orcamento_emailcopiaoculta', trans('admin.email_copia_oculta')) !!}--}}
                        {{--{!! Form::text('orcamento_emailcopiaoculta', null, ['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

        <div class="tab-pane" id="configsmtp">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="form-group">
                        {!! Form::label('smtp_servidor', trans('admin.servidor')) !!}
                        {!! Form::text('smtp_servidor', null, ['class'=>'form-control smtp_servidor']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('smtp_porta', trans('admin.porta')) !!}
                        {!! Form::text('smtp_porta', null, ['class'=>'form-control smtp_porta']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('smtp_seguranca', trans('admin.seguranca')) !!}
                        {!! Form::select('smtp_seguranca', [
                            "" => "Sem segurança",
                            "ssl" => "SSL",
                            "tls" => "TSL",
                        ], null, ['class'=>'form-control select smtp_seguranca']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('smtp_usuario', trans('admin.usuario')) !!}
                        {!! Form::text('smtp_usuario', null, ['class'=>'form-control smtp_usuario']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('smtp_senha', trans('admin.senha')) !!}
                        {!! Form::text('smtp_senha', null, ['class'=>'form-control smtp_senha']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('smtp_email_resposta', trans('admin.email_resposta')) !!}
                        {!! Form::text('smtp_email_resposta', null, ['class'=>'form-control smtp_email_resposta']) !!}
                    </div>

                    {{--<div class="row">--}}
                        {{--<div class="col-lg-3">--}}
                            {{--<a class="btn-animate yellow">{!! trans('admin.testar_config') !!}</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-9">--}}
                            {{--<p class="text-aqua txt-center smtp-resposta"></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <div class="tab-pane" id="analises">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        {!! Form::label('google_analytics', trans('admin.google_analytics')) !!}
                        {!! Form::textarea('google_analytics', null, ['class'=>'form-control no-resize', 'rows'=>5, 'placeholder'=>trans('admin.insere_codigo_aqui')  ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('google_tag_manager', trans('admin.google_tag_manager')) !!}
                        {!! Form::textarea('google_tag_manager', null, ['class'=>'form-control no-resize', 'rows'=>5, 'placeholder'=>trans('admin.insere_codigo_aqui')  ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('analises_outros', trans('admin.outros')) !!}
                        {!! Form::textarea('analises_outros', null, ['class'=>'form-control no-resize', 'rows'=>5, 'placeholder'=>trans('admin.insere_codigo_aqui')  ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>