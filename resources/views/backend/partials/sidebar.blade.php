<?php $active = isset($sidebar['children']) ? active_menu_sidebar($sidebar['children']) : Request::is($sidebar['slug']) || Request::is($sidebar['slug']."/*") ? 'active' : '';?>


<li class="@if(isset($sidebar['children'])) treeview @endif @if(!empty($active)) active @endif">

    <a href="{{ url($sidebar['slug']) }}">

        <span>{{ $sidebar['name'] }}</span>

        @if(isset($sidebar['children']))

            <i class="fa  @if(!empty($active)) fa-angle-up @else fa-angle-down @endif pull-right"></i>
            <ul class="treeview-menu @if(!empty($active)) menu-open @endif">
                @foreach($sidebar['children'] as $sub)
                    @include('backend.partials.sidebar', ['sidebar' => $sub])
                @endforeach
            </ul>

        @endif

    </a>
</li>