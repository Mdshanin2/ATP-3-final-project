<!DOCTYPE html>
<html>
<head>
	<title>Freelancer List</title>
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
				<td>{{$freelancer[$i]['name']}}</td>
				<td>{{$freelancer[$i]['email']}}</td>
				<td>{{$freelancer[$i]['phone']}}</td>
				<td>{{$freelancer[$i]['address']}}</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>