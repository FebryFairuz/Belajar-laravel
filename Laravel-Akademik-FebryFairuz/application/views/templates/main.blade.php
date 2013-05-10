<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Akademik Univ Pancasila</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ Asset::container('bootstrapper')->styles();Asset::container('bootstrapper')->scripts();}}
	
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */		
      }
    </style>
    {{ Asset::container('bootstrapper')->scripts(); }} 
</head>
<body>
     
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container-fluid">
	  <a class="brand">Akademik</a>
	  <div class="btn-group pull-right">
		  <a class="btn btn-info"><i class="icon-user"></i> Lady Gaga</a>
	  </div>
		<ul class="nav">
		  <li class="divider-vertical"></li>
		  <li><a href="{{ URL::base() }}" title="Home"><i class="icon-home" ></i></a></li>
		</ul>
	  </div>
	  </div>
 </div>
    <div class="container">
          <div class="row">
          @yield('content')
          </div>
    </div><!--/container-->
 
    <div class="container">
		<footer>
            <p>Powered By &dagger; febryfairuz.wordpress.com &dagger;
			<br>Copyright &copy; 2013</p>
        </footer>
      </div>
</body>
</html>
