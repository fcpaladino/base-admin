<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="{!! trans('admin.buscar') !!} ...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

            @each('backend.partials.sidebar', config('website.backend.sidebar'), 'sidebar')
        </ul>
    </section>
</aside>