<!DOCTYPE html>
<html>
<head>
	<title>Review Details</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Review Details</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Freelancer Name</td>
			<td>{{$fname}}</td>
		</tr>
		<tr>
			<td>Review</td>
			<td>{{$review}}</td>
		</tr>
		<tr>
			<td>Date</td>
			<td>{{$date}}</td>
		</tr>
	</table>
	<br/>
	<a href="{{route('buyer.reviewlist')}}">Back</a>
	<br/>
	</div>
</body>
</html>