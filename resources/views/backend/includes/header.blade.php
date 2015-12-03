<header class="main-header">
    <a href="{{ url('admin/home') }}" class="logo">
        <span class="logo-mini"><b>S</b>t</span>
        <span class="logo-lg"><b>S</b>ite</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(isset($locales) && count($locales) > 1)
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>&numsp; {!! trans('admin.idioma') !!}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="menu">
                                @foreach($locales as $k => $v)
                                    <li class="@if($k == session()->get('lang_')) active @endif"> <a href="{{ url('admin/lang/'.$k) }}"><i class="fa @if($k == session('lang_')) fa-check-square-o @else fa-square-o @endif"></i>&numsp; {{ $v['titulo'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs"></i>&numsp; {!! trans('admin.btn.configuracoes') !!}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="menu">
                                <li><a href="{{ url('admin/configuracao') }}"><i class="fa fa-cog"></i>&numsp;{!! trans('admin.btn.configuracoes') !!}</a></li>
                                <li><a href="{{ url('admin/usuario') }}"><i class="fa fa-user"></i>&numsp;{!! trans('admin.usuario') !!}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#">
                        <span class="hidden-xs">{{ session('user_usuario') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/logout')  }}" title="{!! trans('admin.sair') !!}"><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>