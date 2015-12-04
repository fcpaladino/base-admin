<section class="content-header">
    <div class="col-lg-6">
        <h1>{!! $titulo or '' !!}<small>{{ $subtitulo or '' }}</small> </h1>
    </div>
    <div class="col-lg-6 pd-r-5">
        @if(empty(getRouteMethod()))
            <a class="btn-animate action pull-right" href="{{ url(getRoute().'/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.btn.adicionar') }}</a>
        @endif
        <div class="buttonTools"></div>
    </div>
    <div class="col-lg-12"><hr></div>
</section>