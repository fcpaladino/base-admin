<?php $active = isset($sidebar['children']) ? active_menu_sidebar($sidebar['children']) : Request::is($sidebar['slug']) || Request::is($sidebar['slug']."/*") ? 'active' : '';?>


<li class="@if(isset($sidebar['children'])) treeview @endif @if(!empty($active)) active @endif">

    <a href="{{ url($sidebar['slug']) }}" @if(isset($sidebar['children'])) data-icon-active="@if(!empty($active)) fa-folder-o @else fa-folder-open-o @endif" @endif >

        <span>{{ $sidebar['name'] }}</span>

        @if(isset($sidebar['children']))

            <i class="fa  @if(!empty($active)) fa-angle-down @else fa-angle-left @endif pull-right"></i>
            <ul class="treeview-menu @if(!empty($active)) menu-open @endif">
                @foreach($sidebar['children'] as $sub)
                    @include('backend.partials.sidebar', ['sidebar' => $sub])
                @endforeach
            </ul>

        @endif

    </a>
</li>