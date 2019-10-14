<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Not found</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="https://tripadv2a2ae2dbcce4.b-cdn.net/errorpage/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="notfound" style="height: 60vh !important;">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
			</div>
			<h2><?=$response['status']?> - <?=$response['title']?></h2>
			<p><?=$response['message']?></p>
			<a class="refresh" href="#">Refresh Page</a>
		</div>
	</div>
    <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script>
		var x = localStorage.getItem("property");
		$('.refresh').attr('href', x);
		console.log('Got: ' + x);
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
