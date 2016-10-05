<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="\css\style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>	
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</head>
<body>
	
	<div class="container">
	    <!--Row with two equal columns-->
	    <div class="row">
	        <div class="col-lg-8 "><content>@yield('content')</content></div>
	        <div class="col-lg-4 "></div>
	    </div>
	 </div>   
	@yield('footer')
</body>
</html>