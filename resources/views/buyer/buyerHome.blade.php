<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/assets/common/css/style.css">
	<title>Buyer Home</title>
</head>
<body>
	@include('buyer.NavBar')
	<div id="workspace">
		<h1 align='center'>Welcome Back</h1>
		<br/>
		<h5>{{$profile['fname']}}</h5>
		<br/>
	</div>
</body>
</html>