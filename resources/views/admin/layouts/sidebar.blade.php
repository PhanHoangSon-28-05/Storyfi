<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>
            <li><a><i class="fa fa-home"></i> Role <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::route('roles.index') }}">List Role</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-home"></i> User <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::route('users.index') }}">List User</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-home"></i> Title <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::route('titles.index') }}">List Titles</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-home"></i> Category <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::route('categories.index') }}">List Category</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-home"></i> Story <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::route('stories.index') }}">List Story</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
