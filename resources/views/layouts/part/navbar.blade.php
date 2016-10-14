<nav class="navbar navbar-inverse">
  	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
	  		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
	  		</button>
	  		<a class="navbar-brand" href="{{ action('PostsController@index') }}"><img src="/img/nav_frog.png"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  		<ul class="nav navbar-nav">
                @if(Auth::check())
	                {{-- Auth::id gives us the id of the logged in user --}}
	                <li><a href="{{ action('UsersController@show', Auth::id()) }}">{{ Auth::user()->name }}</a></li>
	                <li><a href="{{ action('PostsController@create') }}">Create Post</a></li>
	                <li><a href="{{ action('PostsController@index') }}">Post</a></li>
					<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
                @else
					<li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
					<li class=""><a href="{{ action('Auth\AuthController@getRegister') }}">Signup <span class="sr-only">(current)</span></a></li>
                @endif
	  		</ul>
	  
		  	<form class="navbar-form navbar-right">
				<div class="form-group">
			  		<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
		  	</form>
		  
		  	
		</div><!-- /.navbar-collapse -->
  	</div><!-- /.container-fluid -->
</nav>