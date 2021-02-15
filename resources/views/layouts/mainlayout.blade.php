<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>

@include('layouts.partials.header')
	<div class="navbar navbar-default navbar-static-top">
	  <div class="container">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="https://www.mcgill.ca/library"><img src="/borrowing-card/public/img/mcgill_logo.jpg" /></a>
	    </div>
	    <div class="collapse navbar-collapse">
	      <ul class="nav navbar-nav">
		<li class="active"><a href="#">Home</a></li>
		<li><a href="#contact">Contact</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
		<li><a href="#about">About</a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</div>

	<div class="container">
	  
	  <div class="text-censter">
		<p>Please note: Due to the library’s closure during Covid-19, memberships for community members are not currently available.
			 When the library reopens, information about registration and the application form will be added to this page.</p>
		<!--yield('content')-->
	  </div>
	  
	</div><!-- /.container -->

@include('layouts.partials.footer-scripts')

 </body>

</html>
