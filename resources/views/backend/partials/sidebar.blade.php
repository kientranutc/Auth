<aside class="fixed skin-6">
    <div class="sidebar-inner scrollable-sidebar">
        <div class="size-toggle">
            <a class="btn btn-sm" id="sizeToggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
                <i class="fa fa-power-off"></i>
            </a>
        </div><!-- /size-toggle -->
        <div class="user-block clearfix">
            <img src="img/user.jpg" alt="User Avatar">
            <div class="detail">
                <strong>John Doe</strong><span class="badge badge-danger m-left-xs bounceIn animation-delay4">4</span>
                <ul class="list-inline">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="inbox.html" class="no-margin">Inbox</a></li>
                </ul>
            </div>
        </div><!-- /user-block -->
        <div class="search-block">
            <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="search here...">
                <span class="input-group-btn">
							<button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
						</span>
            </div><!-- /input-group -->
        </div><!-- /search-block -->
        <div class="main-menu">
            <ul>
                <li>
                    <a href="index.html">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
                        <span class="text">
									Dashboard
								</span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
                <li class="openable {{(Route::currentRouteName()=='role.index')
                                     ||(Route::currentRouteName()=='role.add')
                                     ||(Route::currentRouteName()=='role.update')
                                     ||(Route::currentRouteName()=='user.index')
                                     ||(Route::currentRouteName()=='user.add')
                                     ||(Route::currentRouteName()=='user.update')
                                        ?'active':''}}">
                    <a href="#">
								<span class="menu-icon">
									<i class="fa fa-file-text fa-lg"></i>
								</span>
                        <span class="text">
									Controll Admin
								</span>
                        <span class="menu-hover"></span>
                    </a>
                    <ul class="submenu">
                        <li class="{{(Route::currentRouteName()=='user.index'?'active':'')}}"><a href="{{URL::route('user.index')}}"> <span class="submenu-label"><i class="fa fa-user fa-lg"></i> User</span></a></li>
                        <li class =" {{(Route::currentRouteName()=='role.index'?'active':'')}}"><a href="{{URL::route('role.index')}}"><span class="submenu-label"><i class="fa fa-user-plus fa-lg"></i> Role</span></a></li>

                    </ul>
                </li>


            </ul>
        </div><!-- /main-menu -->
    </div><!-- /sidebar-inner -->
</aside>