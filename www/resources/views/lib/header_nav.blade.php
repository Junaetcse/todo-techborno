<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <a href="index.html" class="logo"><b>{{ Auth::user()->name }}</b></a>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                @include('message.validation_message')
            </li>
            <li><a class="profile_image"href="{{URL::to('/profile')}}" >
                    @if(!Auth::user()->image == null)
                        <img class="img-circle"  src="{{ asset('uploads/files/' . Auth::user()->image) }}" width="40px" height="40px" align="">
                    @else
                        <img id="blah" height="40px;" src="http://projectidspokane.org/wp-content/uploads/2015/09/profile_default.jpg"alt="your image" />
                    @endif
                </a>
            </li>
            <li>
                <a class="logout" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</header>
