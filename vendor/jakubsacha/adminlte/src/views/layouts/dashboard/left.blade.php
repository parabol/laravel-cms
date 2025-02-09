<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            {{ (!empty($navPages)) ? $navPages : '' }}
            @if (Sentry::check())
                @if($currentUser->hasAccess('view-users-list') || $currentUser->hasAccess('groups-management'))
                <li class="treeview" >
                    <a href="#"><i class="fa fa-user"></i> 
                        <span>{{ trans('syntara::navigation.users') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @if($currentUser->hasAccess('view-users-list'))
                        <li><a href="{{ URL::route('listUsers') }}"><i class="fa fa-users"></i> {{ trans('syntara::navigation.users') }}</a></li>
                        @endif

                        @if($currentUser->hasAccess('groups-management'))
                        <li><a href="{{ URL::route('listGroups') }}"><i class="fa fa-group"></i> {{ trans('syntara::navigation.groups') }}</a></li>
                        @endif
                        @if($currentUser->hasAccess('permissions-management'))
                        <li><a href="{{ URL::route('listPermissions') }}"><i class="fa fa-cogs"></i> {{ trans('syntara::navigation.permissions') }}</a></li>
                        @endif
                    </ul>
                </li>
                @if($currentUser->hasAccess('pages.index'))
                <li>
                    <a href="{{ URL::route('pages.index') }}"><i class="fa fa-list-alt"></i> 
                        <span>{{ trans('pages.titles.menu') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
                @endif
                @endif
                {{ (!empty($navPagesRight)) ? $navPagesRight : '' }}
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
