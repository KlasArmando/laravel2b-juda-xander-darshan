<div class="nav">
	<div class="topnav" id="MainTopnav">
		<a href="{{route('home')}}">Home</a>
		<a href="{{route('user.index')}}">Users</a>
		<a href="{{route('anime.index')}}"> Anime</a>
		<a href="{{route('manga.index')}}">Manga</a>
	</div>
	<div class="login" id="Login">
		@guest
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
		@else
			@can('user-list')
			<a class="dropdown-item" href="{{ route('user.index') }}">
				Admin-Panel
			</a>
			@endcan

			<a class="dropdown-item" href="{{ route('logout') }}"
			   onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
				{{ __('Logout') }}
			</a>
			@endguest
	</div>
</div>
