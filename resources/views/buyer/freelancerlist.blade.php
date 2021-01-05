<!DOCTYPE html>
<html>
<head>
	<title>Freelancer List</title>
	<script type="text/javascript" src="/assets/buyer/js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="/assets/buyer/js/searchFreelancer.js"></script>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Freelancer List</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Freelancer Name</td>
			<td>Freelancer User Name</td>
			<td>Email</td>
			<td>Phone</td>
			<td>Address</td>
		</tr>

		@for($i=0; $i < count($freelancer); $i++)
			<tr>
				<td>{{$freelancer[$i]['id']}}</td>
				<td>{{$freelancer[$i]['fname']}}</td>
				<td>{{$freelancer[$i]['username']}}</td>
				<td>{{$freelancer[$i]['email']}}</td>
				<td>{{$freelancer[$i]['phone']}}</td>
				<td>{{$freelancer[$i]['address']}}</td>
			</tr>
		@endfor
		</table>
		<br/>
		<h2 align='center'>Search Freelancer</h2>
		<form>
			<input type="text" id="searchkey" name="searchkey">
			<input type="button" name="search" value="Search">
		</form>
		<br/>
		<div id="searchresult">
		</div>
	</div>
	
</body>
</html>