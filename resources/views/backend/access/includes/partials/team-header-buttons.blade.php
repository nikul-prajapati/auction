<!--Action Button-->
    @if(Active::checkUriPattern('admin/access/Team') || Active::checkUriPattern('admin/access/Team/deleted') || Active::checkUriPattern('admin/access/Team/deactivated'))
        @include('backend.access.includes.partials.header-export')
    @endif
<!--Action Button-->
<div class="btn-group">
  <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">@lang('menus.backend.access.Team.action')
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{route('admin.access.Team.index')}}"><i class="fa fa-list-ul"></i> @lang('menus.backend.access.Team.list')</a></li>
    @permission('create-user')
    <li><a href="{{route('admin.access.Team.create')}}"><i class="fa fa-plus"></i> @lang('menus.backend.access.Team.add-new')</a></li>
    @endauth
    @permission('view-deactive-user')
    <li><a href="{{route('admin.access.user.deactivated')}}"><i class="fa fa-square"></i> @lang('menus.backend.access.Team.deactivated-users')</a></li>
    @endauth
    @permission('view-deleted-user')
    <li><a href="{{route('admin.access.user.deleted')}}"><i class="fa fa-trash"></i> @lang('menus.backend.access.Team.deleted-users')</a></li>
    @endauth
  </ul>
</div>