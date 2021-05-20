<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <h4 class="text-light">@config('app.name')</h4>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link @RouteIf('admin.dashboard') active @endRouteIf">
                  <i class="nav-icon las la-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
            </li>
            @canany(['user_can_create', 'user_can_read'])
                <li class="nav-item @RouteIf('admin.users.*') menu-open @elseRouteIf('admin.profile') menu-open @endRouteIf">
                    <a href="#" class="nav-link  @RouteIf('admin.users.*') active @endRouteIf">
                    <i class="nav-icon las la-user"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('user_can_create')
                            <li class="nav-item">
                                <a href="{{ route('admin.users.create') }}" class="nav-link @RouteIf('admin.users.create') active @endRouteIf">
                                    <p>Add New</p>
                                </a>
                            </li>
                        @endcan
                        @can('user_can_read')
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link @RouteIf('admin.users.index') active @endRouteIf">
                                    <p>All Users</p>
                                </a>
                            </li>
                        @endcan
                            <li class="nav-item">
                                <a href="{{ route('admin.profile') }}" class="nav-link @RouteIf('admin.profile') active @endRouteIf">
                                    <p>Profile</p>
                                </a>
                            </li>
                    </ul>
                </li>
            @endcanany
            @canany(['role_can_create', 'role_can_read'])
                <li class="nav-item @RouteIf('admin.roles.*') menu-open @endRouteIf">
                    <a href="#" class="nav-link  @RouteIf('admin.roles.*') active @endRouteIf">
                    <i class="nav-icon las la-key"></i>
                    <p>
                        Roles
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('role_can_create')
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.create') }}" class="nav-link @RouteIf('admin.roles.create') active @endRouteIf">
                                    <p>Add New</p>
                                </a>
                            </li>
                        @endcan
                        @can('role_can_read')
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}" class="nav-link @RouteIf('admin.roles.index') active @endRouteIf">
                                    <p>All Roles</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block mt-4" style="border-radius: 0px">Logout</button>
                </form>
            </li>
        </ul>
      </nav>
    </div>
</aside>
