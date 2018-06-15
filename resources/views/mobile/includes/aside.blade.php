<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar" style="display: none;">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
            </div>
            <div class="email">
                {{ auth()->user()->email }}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{route('mobile.users.edit', auth()->user()->id)}}"><i class="material-icons">person</i>Profile</a></li>
                    {{--<li role="seperator" class="divider"></li>--}}
                    {{--<li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>--}}
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{route('mobile.auth.logout')}}"><i class="material-icons">input</i>Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ active('home') }} {{active('mobile/users')}}">
                <a href="{{route('mobile.home')}}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{{ active('boxes') }}">
                <a href="{{route('mobile.boxes.index')}}">
                    <i class="material-icons">text_fields</i>
                    <span>Caixas</span>
                </a>
            </li>
            <li class="{{ active('mobile/participants') }}">
                <a href="{{route('mobile.participants.index')}}">
                    <i class="material-icons">layers</i>
                    <span>Participantes</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->