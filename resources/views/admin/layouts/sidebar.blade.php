<div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="font-size: 15px;">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>
            <li><a href="filemanager"><i class="fa fa-home"></i> filemanager </a></li>
                {{-- <li><a href="tinymce"><i class="fa fa-home"></i> tinymce </a></li>
                <li><a href="cdkeditor"><i class="fa fa-home"></i> cdkeditor </a></li> --}}

            @hasrole('super-admin')
                {{-- <li><a><i class="fa fa-home"></i> Config <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ URL::route('configs.index') }}">List Config</a></li>
                    </ul>
                </li> --}}

                <li><a><i class="fa fa-home"></i> Role <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ URL::route('roles.index') }}">List Role</a></li>
                    </ul>
                </li>
            @endhasrole

            @can('show-user')
                <li><a><i class="fa fa-home"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ URL::route('users.index') }}">List User</a></li>
                    </ul>
                </li>
            @endcan

            @can('show-title')
                <li><a><i class="fa fa-home"></i> Title <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ URL::route('titles.index') }}">List Titles</a></li>
                    </ul>
                </li>
            @endcan

            @can('show-category')
                <li><a><i class="fa fa-home"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ URL::route('categories.index') }}">List Category</a></li>
                    </ul>
                </li>
            @endcan

            @hasrole(['super-admin', 'admin'])
                <li><a href="{{ URL::route('list-stories.index') }}"><i class="fa fa-home"></i> All Story </a>
                </li>
            @endhasrole

            @hasrole(['super-admin', 'admin'])
                <li><a href="{{ URL::route('list-stories-comment.index') }}"><i class="fa fa-home"></i> All Comment </a>
                </li>
            @endhasrole

            @can('show-story')
                <li><a><i class="fa fa-home"></i> Story <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ URL::route('stories.index') }}">List Story</a></li>
                    </ul>
                </li>
            @endcan

        </ul>
    </div>
</div>
